<?php

namespace Tests;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function makeUser(string $email = 'test@example.com'): User
    {
        return User::create([
            'name' => 'Test User',
            'email' => $email,
            'password' => bcrypt('password'),
        ]);
    }

    protected function makeGroup(int $perDay = 3): Group
    {
        return Group::create([
            'category_id' => '1',
            'name' => 'Beans',
            'icon_location' => 'icon.png',
            'banner_location' => 'banner.png',
            'per_day' => $perDay,
        ]);
    }
}
