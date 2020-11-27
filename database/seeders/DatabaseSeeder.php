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
      $today = Carbon::today();
      $yesterday = $today->addDays(-1);
      $twoDaysBefore = $yesterday->addDays(-1);

      $devUser = User::create([
            'name' => 'Vegan Hacktivists',
            'email' => 'vh@example.com',
            'email_verified_at' => now(),
            'created_at' => $twoDaysBefore,

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
                'size_imperial' => '¼ cup of hummus or bean dip',
                'size_metric' => '60g of hummus or bean dip',
                'group_id' => $group->id,
            ]);

            ServingSize::create([
              'size_imperial' => '1 cup of fresh peas or sprouted lentils',
              'size_metric' => '150g of fresh peas or sprouted lentils',
              'group_id' => $group->id,
            ]);
            ServingSize::create([
              'size_imperial' => '½ cup of cooked beans, split peas, lentils, tofu or tempeh',
              'size_metric' => '130g of cooked beans, split peas, lentils, tofu or tempeh',
              'group_id' => $group->id,
            ]);

            DetailType::create([
                'name' => 'Detail',
                'video' => 'example.com',
                'group_id' => $group->id,
            ]);
        });

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
        $devUser->setCheckCountForGroupAndDate($nutYeast, $today, 1);
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
        $devUser->setCheckCountForGroupAndDate($nutYeast, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $yesterday, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $yesterday, 1);

        $devUser->setCheckCountForGroupAndDate($beans, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($berries, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($undistractedMeals, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($nutYeast, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $twoDaysBefore, 1);
        $devUser->setCheckCountForGroupAndDate($tea, $twoDaysBefore, 1);
    }
}
