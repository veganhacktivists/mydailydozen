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

        $today = Carbon::today();
        $yesterday = $today->addDays(-1);
        $twoDaysBefore = $yesterday->addDays(-1);

        $devUser = User::create([
            'name' => 'Vegan Hacktivists',
            'email' => 'vh@example.com',
            'email_verified_at' => now(),
            'created_at' => $twoDaysBefore,

            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $beans = Group::where('name', "Beans")->firstOrFail();
        $berries = Group::where('name', "Berries")->firstOrFail();
        $fruits = Group::where('name', "Other Fruits")->firstOrFail();
        $cruciferous = Group::where('name', "Cruciferous Vegetables")->firstOrFail();
        $otherVegetables = Group::where('name', "Other Vegetables")->firstOrFail();
        $grains = Group::where('name', "Whole Grains")->firstOrFail();
        $beverages = Group::where('name', "Beverages")->firstOrFail();
        $negativeCaloriePreload = Group::where('name', "Negative Calorie Preload")->firstOrFail();
        $vinegar = Group::where('name', "Incorporate Vinegar")->firstOrFail();
        $undistractedMeals = Group::where('name', "Undistracted Meals")->firstOrFail();
        $tea = Group::where('name', "Green Tea")->firstOrFail();
        $twentyMinute = Group::where('name', "Twenty-minute Rule")->firstOrFail();
        $weigh = Group::where('name', "Weigh Twice Daily")->firstOrFail();

        $devUser->selectAllGroups();
        $devUser->setCheckCountForGroupAndDate($beans, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beans, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beans, $today, 1);
        $devUser->setCheckCountForGroupAndDate($berries, $today, 1);
        $devUser->setCheckCountForGroupAndDate($fruits, $today, 1);
        $devUser->setCheckCountForGroupAndDate($fruits, $today, 1);
        $devUser->setCheckCountForGroupAndDate($fruits, $today, 1);
        $devUser->setCheckCountForGroupAndDate($cruciferous, $today, 1);
        $devUser->setCheckCountForGroupAndDate($cruciferous, $today, 1);
        $devUser->setCheckCountForGroupAndDate($cruciferous, $today, 1);
        $devUser->setCheckCountForGroupAndDate($otherVegetables, $today, 1);
        $devUser->setCheckCountForGroupAndDate($otherVegetables, $today, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $today, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $today, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $today, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $today, 1);
        $devUser->setCheckCountForGroupAndDate($negativeCaloriePreload, $today, 1);
        $devUser->setCheckCountForGroupAndDate($negativeCaloriePreload, $today, 1);
        $devUser->setCheckCountForGroupAndDate($negativeCaloriePreload, $today, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $today, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $today, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $today, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $today, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $today, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $today, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $today, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $today, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $today, 1);
        $devUser->setCheckCountForGroupAndDate($twentyMinute, $today, 1);
        $devUser->setCheckCountForGroupAndDate($twentyMinute, $today, 1);
        $devUser->setCheckCountForGroupAndDate($twentyMinute, $today, 1);
        $devUser->setCheckCountForGroupAndDate($weigh, $today, 1);
        $devUser->setCheckCountForGroupAndDate($weigh, $today, 1);

        $devUser->setCheckCountForGroupAndDate($beans, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($beans, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($berries, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($fruits, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($cruciferous, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($cruciferous, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($otherVegetables, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($grains, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($beverages, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($negativeCaloriePreload, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($negativeCaloriePreload, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($vinegar, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $yesterday, 1);

        $devUser->setCheckCountForGroupAndDate($beans, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($berries, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $twoDaysBefore, 1);
    }
}
