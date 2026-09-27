<?php

namespace Tests\Feature;

use App\Livewire\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class TimezoneTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_a_tick_counts_towards_the_users_own_day(): void
    {
        // 8pm on the 26th in Los Angeles is already the 27th in UTC
        Carbon::setTestNow('2026-09-27 03:00:00');
        $user = $this->makeUser();
        $user->forceFill(['timezone' => 'America/Los_Angeles'])->save();
        $group = $this->makeGroup();

        Livewire::actingAs($user)->test(Card::class, ['group' => $group])->call('check', 1);

        $this->assertSame('2026-09-26', substr(DB::table('group_user')->value('recorded_at'), 0, 10));
    }

    public function test_without_a_timezone_the_day_is_utc(): void
    {
        Carbon::setTestNow('2026-09-27 03:00:00');
        $user = $this->makeUser();

        Livewire::actingAs($user)->test(Card::class, ['group' => $this->makeGroup()])->call('check', 1);

        $this->assertSame('2026-09-27', substr(DB::table('group_user')->value('recorded_at'), 0, 10));
    }

    public function test_the_browser_timezone_is_remembered(): void
    {
        $this->withoutVite();
        $user = $this->makeUser();

        $this->actingAs($user)->withUnencryptedCookie('timezone', 'America/Los_Angeles')->get('/groups')->assertOk();

        $this->assertSame('America/Los_Angeles', $user->fresh()->timezone);
    }

    public function test_an_unknown_timezone_is_ignored(): void
    {
        $this->withoutVite();
        $user = $this->makeUser();

        $this->actingAs($user)->withUnencryptedCookie('timezone', 'Mars/Olympus_Mons')->get('/groups')->assertOk();

        $this->assertNull($user->fresh()->timezone);
    }

    public function test_a_tick_is_rejected_when_the_browser_timezone_changes_the_day(): void
    {
        Carbon::setTestNow('2026-09-27 03:00:00');
        $user = $this->makeUser();
        $group = $this->makeGroup();
        $user->setCheckCountForGroupAndDate($group, Carbon::parse('2026-09-26'), 1);

        $card = Livewire::actingAs($user)->test(Card::class, ['group' => $group]);
        $user->forceFill(['timezone' => 'America/Los_Angeles'])->save();

        $card->call('check', 2)->assertRedirect(route('groups.index'));

        $this->assertSame('America/Los_Angeles', $user->fresh()->timezone);
        $this->assertSame(1, (int) DB::table('group_user')->whereDate('recorded_at', '2026-09-26')->value('checked'));
        $this->assertDatabaseCount('group_user', 1);
    }

    public function test_a_tick_is_rejected_when_an_open_card_crosses_midnight(): void
    {
        Carbon::setTestNow('2026-09-26 23:59:00');
        $user = $this->makeUser();
        $group = $this->makeGroup();
        $user->setCheckCountForGroupAndDate($group, $user->today(), 1);

        $card = Livewire::actingAs($user)->test(Card::class, ['group' => $group]);
        Carbon::setTestNow('2026-09-27 00:01:00');

        $card->call('check', 2)->assertRedirect(route('groups.index'));

        $this->assertSame(1, (int) DB::table('group_user')->whereDate('recorded_at', '2026-09-26')->value('checked'));
        $this->assertDatabaseCount('group_user', 1);
    }

    public function test_a_tick_is_rejected_when_the_timezone_changes_but_the_date_does_not(): void
    {
        Carbon::setTestNow('2026-09-27 12:00:00');
        $user = $this->makeUser();
        $group = $this->makeGroup();

        $card = Livewire::actingAs($user)->test(Card::class, ['group' => $group]);
        $user->forceFill(['timezone' => 'Europe/London'])->save();

        $card->call('check', 1)->assertRedirect(route('groups.index'));

        $this->assertDatabaseCount('group_user', 0);
    }
}
