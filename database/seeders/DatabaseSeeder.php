<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductionSeeder::class);

        if (app()->isProduction()) {
            return;
        }

        if (User::where('email', 'vh@example.com')->exists()) {
            return;
        }

        $today = Carbon::today()->toImmutable();

        $devUser = User::create([
            'name' => 'Vegan Hacktivists',
            'email' => 'vh@example.com',
            'email_verified_at' => now(),
            'created_at' => $today->subDays(2),

            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $devUser->selectAllGroups();

        $servings = [
            0 => [
                'Beans' => 3,
                'Berries' => 1,
                'Other Fruits' => 3,
                'Cruciferous Vegetables' => 3,
                'Other Vegetables' => 2,
                'Whole Grains' => 3,
                'Beverages' => 5,
                'Negative Calorie Preload' => 3,
                'Incorporate Vinegar' => 3,
                'Undistracted Meals' => 3,
                'Green Tea' => 3,
                'Twenty-minute Rule' => 3,
                'Weigh Twice Daily' => 2,
            ],
            1 => [
                'Beans' => 2,
                'Berries' => 1,
                'Other Fruits' => 1,
                'Cruciferous Vegetables' => 2,
                'Other Vegetables' => 1,
                'Whole Grains' => 3,
                'Beverages' => 3,
                'Negative Calorie Preload' => 2,
                'Incorporate Vinegar' => 3,
                'Undistracted Meals' => 1,
                'Green Tea' => 2,
            ],
            2 => [
                'Beans' => 1,
                'Berries' => 1,
                'Undistracted Meals' => 1,
                'Green Tea' => 2,
            ],
        ];

        foreach ($servings as $daysAgo => $groups) {
            foreach ($groups as $name => $count) {
                $devUser->setCheckCountForGroupAndDate(Group::where('name', $name)->firstOrFail(), $today->subDays($daysAgo), $count);
            }
        }
    }
}
