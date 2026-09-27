<?php

namespace Tests\Feature;

use App\Services\HistoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_history_includes_the_latest_recorded_day(): void
    {
        Carbon::setTestNow('2026-09-20 09:00:00');
        $user = $this->makeUser();
        $beans = $this->makeGroup(perDay: 3);
        $berries = $this->makeGroup(perDay: 2);
        $user->currentGroups()->attach([$beans->id, $berries->id]);

        $user->setCheckCountForGroupAndDate($beans, Carbon::parse('2026-09-25'), 3);
        $user->setCheckCountForGroupAndDate($berries, Carbon::parse('2026-09-25'), 1);
        $user->setCheckCountForGroupAndDate($beans, Carbon::parse('2026-09-21'), 2);

        $history = app(HistoryService::class)->buildForUser($user->fresh())
            ->keyBy(fn ($day) => "{$day['year']}-{$day['month']}-{$day['day']}");

        $this->assertSame(
            ['2026-09-20', '2026-09-21', '2026-09-22', '2026-09-23', '2026-09-24', '2026-09-25'],
            $history->keys()->sort()->values()->all(),
        );
        $this->assertEquals(['count' => 2, 'total' => 5], collect($history['2026-09-21'])->only('count', 'total')->all());
        $this->assertEquals(['count' => 4, 'total' => 5], collect($history['2026-09-25'])->only('count', 'total')->all());
        $this->assertEquals(['count' => 0, 'total' => 5], collect($history['2026-09-23'])->only('count', 'total')->all());
    }

    public function test_one_food_ticked_off_is_not_a_full_day(): void
    {
        $user = $this->makeUser();
        $beans = $this->makeGroup(perDay: 3);
        $berries = $this->makeGroup(perDay: 2);
        $user->currentGroups()->attach([$beans->id, $berries->id]);

        $user->setCheckCountForGroupAndDate($beans, $user->today(), 3);

        $today = app(HistoryService::class)->buildForUser($user->fresh())->last();

        $this->assertSame([3, 5], [$today['count'], $today['total']]);
    }

    public function test_foods_no_longer_tracked_are_left_out(): void
    {
        $user = $this->makeUser();
        $beans = $this->makeGroup(perDay: 3);
        $berries = $this->makeGroup(perDay: 2);
        $user->currentGroups()->attach($berries->id);

        $user->setCheckCountForGroupAndDate($beans, $user->today(), 3);
        $user->setCheckCountForGroupAndDate($berries, $user->today(), 2);

        $today = app(HistoryService::class)->buildForUser($user->fresh())->last();

        $this->assertSame([2, 2], [$today['count'], $today['total']]);
    }

    public function test_history_includes_days_after_the_last_tick(): void
    {
        Carbon::setTestNow('2026-09-27 12:00:00');
        $user = $this->makeUser();
        $user->forceFill(['created_at' => '2026-09-24 12:00:00'])->save();
        $group = $this->makeGroup();
        $user->currentGroups()->attach($group->id);
        $user->setCheckCountForGroupAndDate($group, Carbon::parse('2026-09-25'), 1);

        $history = app(HistoryService::class)->buildForUser($user)
            ->keyBy(fn ($day) => "{$day['year']}-{$day['month']}-{$day['day']}");

        $this->assertSame(0, $history['2026-09-26']['count']);
        $this->assertSame(0, $history['2026-09-27']['count']);
    }

    public function test_negative_legacy_ticks_do_not_reduce_the_daily_total(): void
    {
        $user = $this->makeUser();
        $beans = $this->makeGroup();
        $berries = $this->makeGroup();
        $user->currentGroups()->attach([$beans->id, $berries->id]);

        DB::table('group_user')->insert([
            ['user_id' => $user->id, 'group_id' => $beans->id, 'recorded_at' => $user->today(), 'checked' => -2],
            ['user_id' => $user->id, 'group_id' => $berries->id, 'recorded_at' => $user->today(), 'checked' => 1],
        ]);

        $today = app(HistoryService::class)->buildForUser($user)->last();

        $this->assertSame(1, $today['count']);
    }
}
