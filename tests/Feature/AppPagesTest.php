<?php

namespace Tests\Feature;

use App\Livewire\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use App\Livewire\CardToggle;
use Illuminate\Support\Facades\DB;
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
        $user = $this->makeUser();
        $group = $this->makeGroup(perDay: 3);
        $user->currentGroups()->attach($group->id);
        $this->actingAs($user);

        Livewire::test(Card::class, ['group' => $group])
            ->call('check', 2)
            ->assertDispatched('serving-checked', group: $group->id, count: 2);
    }

    public function test_a_card_never_shows_more_ticks_than_servings(): void
    {
        $this->actingAs($this->makeUser());

        Livewire::test(Card::class, ['group' => $this->makeGroup(perDay: 1), 'checkCount' => 3])
            ->assertSet('checkCount', 1)
            ->assertSeeText('1 / 1');
    }

    public function test_the_customise_switch_does_what_this_tab_shows(): void
    {
        $user = $this->makeUser();
        $group = $this->makeGroup();
        $user->currentGroups()->sync([$group->id]);
        $this->actingAs($user);
        $tab = Livewire::test(CardToggle::class, ['group' => $group])->assertSet('checked', true);

        $user->currentGroups()->detach($group->id);
        $this->actingAs($user->fresh());
        $tab->call('toggleGroup');

        $tab->assertSet('checked', false);
        $this->assertFalse($user->currentGroups()->whereKey($group->id)->exists());
    }

    public function test_select_all_and_unselect_all_work_without_javascript(): void
    {
        $user = $this->makeUser();
        $user->markEmailAsVerified();
        $groups = [$this->makeGroup(), $this->makeGroup()];

        $this->actingAs($user)->put('/settings/all')->assertRedirect('/settings');
        $this->assertSame(2, $user->currentGroups()->count());

        $this->actingAs($user)->put('/settings/none')->assertRedirect('/settings');
        $this->assertSame(0, $user->currentGroups()->count());
    }

    public function test_an_open_dashboard_cannot_tick_a_food_turned_off_elsewhere(): void
    {
        $user = $this->makeUser();
        $group = $this->makeGroup();
        $user->currentGroups()->sync([$group->id]);
        $this->actingAs($user);
        $card = Livewire::test(Card::class, ['group' => $group]);

        $user->currentGroups()->detach($group->id);
        $card->call('check', 1)->assertRedirect(route('groups.index'));

        $this->assertDatabaseMissing('group_user', ['user_id' => $user->id, 'group_id' => $group->id]);
    }

    public function test_a_negative_count_left_in_the_database_does_not_break_the_dashboard(): void
    {
        $user = $this->makeUser();
        $user->markEmailAsVerified();
        $group = $this->makeGroup();
        $user->currentGroups()->sync([$group->id]);
        DB::table('group_user')->insert(['user_id' => $user->id, 'group_id' => $group->id, 'recorded_at' => $user->today(), 'checked' => -1]);

        $this->actingAs($user)->get('/groups')->assertOk()->assertSee('aria-valuenow', false)->assertSeeText('0 / 3');
    }

    public function test_the_calendar_takes_today_from_the_server(): void
    {
        $user = $this->makeUser();
        $user->markEmailAsVerified();
        $user->forceFill(['timezone' => 'Pacific/Kiritimati'])->save();

        $this->actingAs($user)->get('/history')->assertOk()->assertSee("const TODAY = '{$user->today()->toDateString()}'", false);
    }
}
