<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class CheckCountPersistenceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Regression: the first checkbox tick of a food group on a given day used to
     * fall into an unreachable branch and never persist. It must create a pivot row.
     */
    public function test_first_check_of_the_day_is_persisted(): void
    {
        $user = $this->makeUser();
        $group = $this->makeGroup(perDay: 3);
        $today = Carbon::today();

        // Nothing recorded yet.
        $this->assertSame(0, $user->getCheckCountForGroupAndDate($group, $today));

        $returned = $user->setCheckCountForGroupAndDate($group, $today, 1);

        $this->assertSame(1, $returned);
        $this->assertDatabaseHas('group_user', [
            'user_id' => $user->id,
            'group_id' => $group->id,
            'checked' => 1,
        ]);
        // Re-read from the database to prove it survives a reload.
        $this->assertSame(1, $user->fresh()->getCheckCountForGroupAndDate($group, $today));
    }

    /**
     * Subsequent ticks on the same day update the existing row rather than
     * inserting a second one (the pivot is unique per user/group/date).
     */
    public function test_subsequent_checks_update_the_same_row(): void
    {
        $user = $this->makeUser();
        $group = $this->makeGroup(perDay: 5);
        $today = Carbon::today();

        $user->setCheckCountForGroupAndDate($group, $today, 1);
        $user->setCheckCountForGroupAndDate($group, $today, 3);

        $this->assertSame(3, $user->fresh()->getCheckCountForGroupAndDate($group, $today));
        $this->assertDatabaseCount('group_user', 1);
    }

    /**
     * The count written is clamped to the group's per_day cap.
     */
    public function test_check_count_is_clamped_to_per_day(): void
    {
        $user = $this->makeUser();
        $group = $this->makeGroup(perDay: 2);
        $today = Carbon::today();

        $returned = $user->setCheckCountForGroupAndDate($group, $today, 10);

        $this->assertSame(2, $returned);
        $this->assertSame(2, $user->fresh()->getCheckCountForGroupAndDate($group, $today));
    }
}
