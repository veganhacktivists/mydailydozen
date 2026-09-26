<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
