<?php

namespace Tests\Feature;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AccountDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_deleting_an_account_takes_its_data_with_it(): void
    {
        $user = $this->makeUser();
        $other = $this->makeUser('other@example.com');
        $group = $this->makeGroup();
        foreach ([$user, $other] as $person) {
            $person->currentGroups()->sync([$group->id]);
            $person->setCheckCountForGroupAndDate($group, $person->today(), 2);
        }
        DB::table('password_resets')->insert(['email' => $user->email, 'token' => 'hashed', 'created_at' => now()]);
        DB::table('sessions')->insert(['id' => 'abc', 'user_id' => $user->id, 'payload' => '', 'last_activity' => time()]);

        app(DeleteUser::class)->delete($user->fresh());

        $this->assertModelMissing($user);
        foreach (['group_user', 'use_tracker', 'sessions'] as $table) {
            $this->assertDatabaseMissing($table, ['user_id' => $user->id]);
        }
        $this->assertDatabaseMissing('password_resets', ['email' => $user->email]);
        $this->assertDatabaseHas('group_user', ['user_id' => $other->id]);
        $this->assertDatabaseHas('use_tracker', ['user_id' => $other->id]);
    }
}
