<?php

namespace Tests\Feature;

use App\Services\HistoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_history_runs_from_sign_up_to_the_latest_recorded_day(): void
    {
        Carbon::setTestNow('2026-09-20 09:00:00');
        $user = $this->makeUser();
        $beans = $this->makeGroup(perDay: 3);
        $berries = $this->makeGroup(perDay: 2);

        $user->setCheckCountForGroupAndDate($beans, Carbon::parse('2026-09-25'), 3);
        $user->setCheckCountForGroupAndDate($berries, Carbon::parse('2026-09-25'), 1);
        $user->setCheckCountForGroupAndDate($beans, Carbon::parse('2026-09-21'), 2);

        $history = app(HistoryService::class)->buildForUser($user->fresh())
            ->keyBy(fn ($day) => "{$day['year']}-{$day['month']}-{$day['day']}");

        $this->assertSame(
            ['2026-09-20', '2026-09-21', '2026-09-22', '2026-09-23', '2026-09-24', '2026-09-25'],
            $history->keys()->sort()->values()->all(),
        );
        $this->assertEquals(['count' => 2, 'total' => 3], collect($history['2026-09-21'])->only('count', 'total')->all());
        $this->assertEquals(['count' => 4, 'total' => 5], collect($history['2026-09-25'])->only('count', 'total')->all());
        $this->assertEquals(['count' => 0, 'total' => null], collect($history['2026-09-23'])->only('count', 'total')->all());
    }
}
