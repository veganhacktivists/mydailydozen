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
}
