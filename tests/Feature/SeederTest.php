<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeding_twice_keeps_one_copy_of_each_food(): void
    {
        $this->seed();
        $groups = Group::count();

        $this->seed();

        $this->assertSame($groups, Group::count());
        $this->assertSame(1, User::where('email', 'vh@example.com')->count());
    }

    public function test_the_sample_account_has_three_days_of_history(): void
    {
        $this->seed();
        $user = User::where('email', 'vh@example.com')->firstOrFail();

        $days = DB::table('group_user')->where('user_id', $user->id)->distinct()->count('recorded_at');

        $this->assertSame(3, $days);
    }
}
