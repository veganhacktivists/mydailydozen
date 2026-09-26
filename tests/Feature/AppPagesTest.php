<?php

namespace Tests\Feature;

use App\Livewire\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AppPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_the_menus_mark_the_page_you_are_on(): void
    {
        $user = $this->makeUser();
        $user->markEmailAsVerified();

        $html = $this->actingAs($user)->get('/history')->assertOk()->getContent();

        preg_match_all('/<a href="\/(\w+)"\s+aria-current="page"/', $html, $current);
        $this->assertSame(['history', 'history'], $current[1]);
    }

    public function test_both_contact_pages_use_the_same_form(): void
    {
        $public = $this->get('/contact')->assertOk()->getContent();
        $signedIn = $this->actingAs($this->makeUser('ada@example.com'))->get('/contact')->assertOk()->getContent();

        foreach ([$public, $signedIn] as $html) {
            preg_match_all('/<pattern id="([^"]+)"/', $html, $ids);
            $this->assertCount(2, array_unique($ids[1]));
            $this->assertSame(1, substr_count($html, 'action="/contact/send"'));
        }
        $this->assertStringContainsString('value="ada@example.com"', $signedIn);
    }

    public function test_ticking_a_serving_tells_the_daily_total(): void
    {
        $this->actingAs($this->makeUser());
        $group = $this->makeGroup(perDay: 3);

        Livewire::test(Card::class, ['group' => $group])
            ->call('check', 2)
            ->assertDispatched('serving-checked', group: $group->id, count: 2);
    }
}
