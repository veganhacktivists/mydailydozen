<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DetailType;
use App\Models\Group;
use App\Models\ServingSize;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
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

      $devUser = User::create([
        'name' => 'Vegan Hacktivists',
            'email' => 'vh@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
      ]);

        $daily_dozen = Category::create([
            'name' => 'daily_dozen',
        ]);

        $beans = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Beans',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $berries = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Berries',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $fruits = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Other Fruits',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $cruciferous = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Cruciferous Vegetables',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Greens',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $otherVegetables = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Other Vegetables',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 2,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Flaxseeds',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Nuts and Seeds',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Herbs and Spices',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $grains = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Whole Grains',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $beverages = Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Beverages',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 5,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Exercise',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $supplements = Category::create([
            'name' => 'supplements',
        ]);

        // These NIDs are in source code but not in app.
        // Included here for reference.
        // 'otherVitaminD'
        // 'otherOmega3'

        Group::create([
            'category_id' => $supplements->id,
            'name' => 'Vitamin B12',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $tweaks = Category::create([
            'name' => 'tweaks',
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Preload Water',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $negativeCaloriePreload = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Negative Calorie Preload',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $vinegar = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Incorporate Vinegar',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $undistractedMeals = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Undistracted Meals',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        $twentyMinute = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Twenty-minute Rule',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Black Cumin',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Garlic Powder',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Ginger or Cayenne',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $nutYeast = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Nutritional Yeast',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Cumin',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 2,
        ]);

        $tea = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Green Tea',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Stay Hydrated',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Deflour Diet',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Front-load Calories',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Time-restrict Eating',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Exercising Timing',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        $weigh = Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Weigh Twice Daily',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 2,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Complete Intentions',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Fast After 7:00 p.m.',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Sufficient Sleep',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Trendelenburg',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::all()->each(function ($group) {
            ServingSize::create([
                'size_imperial' => 'N/A ft',
                'size_metric' => 'N/A m',
                'group_id' => $group->id,
            ]);

            DetailType::create([
                'name' => 'Detail',
                'video' => 'example.com',
                'group_id' => $group->id,
            ]);
        });

        $devUser->selectAllGroups();
        $today = Carbon::today();
        $devUser->incrementCheckCountForGroupAndDate($beans, $today);
        $devUser->incrementCheckCountForGroupAndDate($beans, $today);
        $devUser->incrementCheckCountForGroupAndDate($beans, $today);
        $devUser->incrementCheckCountForGroupAndDate($berries, $today);
        $devUser->incrementCheckCountForGroupAndDate($fruits, $today);
        $devUser->incrementCheckCountForGroupAndDate($fruits, $today);
        $devUser->incrementCheckCountForGroupAndDate($fruits, $today);
        $devUser->incrementCheckCountForGroupAndDate($cruciferous, $today);
        $devUser->incrementCheckCountForGroupAndDate($cruciferous, $today);
        $devUser->incrementCheckCountForGroupAndDate($cruciferous, $today);
        $devUser->incrementCheckCountForGroupAndDate($otherVegetables, $today);
        $devUser->incrementCheckCountForGroupAndDate($otherVegetables, $today);
        $devUser->incrementCheckCountForGroupAndDate($grains, $today);
        $devUser->incrementCheckCountForGroupAndDate($grains, $today);
        $devUser->incrementCheckCountForGroupAndDate($grains, $today);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $today);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $today);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $today);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $today);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $today);
        $devUser->incrementCheckCountForGroupAndDate($negativeCaloriePreload, $today);
        $devUser->incrementCheckCountForGroupAndDate($negativeCaloriePreload, $today);
        $devUser->incrementCheckCountForGroupAndDate($negativeCaloriePreload, $today);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $today);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $today);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $today);
        $devUser->incrementCheckCountForGroupAndDate($undistractedMeals, $today);
        $devUser->incrementCheckCountForGroupAndDate($undistractedMeals, $today);
        $devUser->incrementCheckCountForGroupAndDate($undistractedMeals, $today);
        $devUser->incrementCheckCountForGroupAndDate($nutYeast, $today);
        $devUser->incrementCheckCountForGroupAndDate($tea, $today);
        $devUser->incrementCheckCountForGroupAndDate($tea, $today);
        $devUser->incrementCheckCountForGroupAndDate($tea, $today);
        $devUser->incrementCheckCountForGroupAndDate($twentyMinute, $today);
        $devUser->incrementCheckCountForGroupAndDate($twentyMinute, $today);
        $devUser->incrementCheckCountForGroupAndDate($twentyMinute, $today);
        $devUser->incrementCheckCountForGroupAndDate($weigh, $today);
        $devUser->incrementCheckCountForGroupAndDate($weigh, $today);
        
        $yesterday = $today->addDays(-1);
        $devUser->incrementCheckCountForGroupAndDate($beans, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($beans, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($berries, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($fruits, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($cruciferous, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($cruciferous, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($otherVegetables, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($grains, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($grains, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($grains, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($beverages, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($negativeCaloriePreload, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($negativeCaloriePreload, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($vinegar, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($undistractedMeals, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($nutYeast, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($tea, $yesterday);
        $devUser->incrementCheckCountForGroupAndDate($tea, $yesterday);

        $twoDaysBefore = $yesterday->addDays(-1);
        $devUser->incrementCheckCountForGroupAndDate($beans, $twoDaysBefore);
        $devUser->incrementCheckCountForGroupAndDate($berries, $twoDaysBefore);
        $devUser->incrementCheckCountForGroupAndDate($undistractedMeals, $twoDaysBefore);
        $devUser->incrementCheckCountForGroupAndDate($nutYeast, $twoDaysBefore);
        $devUser->incrementCheckCountForGroupAndDate($tea, $twoDaysBefore);
        $devUser->incrementCheckCountForGroupAndDate($tea, $twoDaysBefore);


    }
}
