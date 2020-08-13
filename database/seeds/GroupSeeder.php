<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeBeans',
            'name' => 'Beans',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeBerries',
            'name' => 'Berries',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeFruitsOther',
            'name' => 'Other Fruits',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeVegetablesCruciferous',
            'name' => 'Cruciferous Vegetables',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeGreens',
            'name' => 'Greens',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeVegetablesOther',
            'name' => 'Other Vegetables',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 2
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeFlaxseeds',
            'name' => 'Flaxseeds',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeNuts',
            'name' => 'Nuts and Seeds',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeSpices',
            'name' => 'Herbs and Spices',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeWholeGrains',
            'name' => 'Whole Grains',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeBeverages',
            'name' => 'Beverages',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 5
        ]);

        Group::create([
            'category' => 'daily_dozen',
            'group_nid' => 'dozeExercise',
            'name' => 'Exercise',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        // These NIDs are in source code but not in app.
        // Included here for reference.
        // 'otherVitaminD'
        // 'otherOmega3'

        Group::create([
            'category' => 'supplements',
            'group_nid' => 'otherVitaminB12',
            'name' => 'Vitamin B12',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakMealWater',
            'name' => 'Preload Water',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakMealNegCal',
            'name' => 'Negative Calorie Preload',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakMealVinegar',
            'name' => 'Incorporate Vinegar',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakMealUndistracted',
            'name' => 'Undistracted Meals',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakMeal20Minutes',
            'name' => 'Twenty-minute Rule',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyBlackCumin',
            'name' => 'Black Cumin',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyGarlic',
            'name' => 'Garlic Powder',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyGinger',
            'name' => 'Ginger or Cayenne',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyNutriYeast',
            'name' => 'Nutritional Yeast',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyCumin',
            'name' => 'Cumin',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 2
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyGreenTea',
            'name' => 'Green Tea',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyHydrate',
            'name' => 'Stay Hydrated',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyDeflourDiet',
            'name' => 'Deflour Diet',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyFrontLoad',
            'name' => 'Front-load Calories',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakDailyTimeRestrict',
            'name' => 'Time-restrict Eating',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakExerciseTiming',
            'name' => 'Exercising Timing',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakWeightTwice',
            'name' => 'Weigh Twice Daily',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 2
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakCompleteIntentions',
            'name' => 'Complete Intentions',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 3
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakNightlyFast',
            'name' => 'Fast After 7:00 p.m.',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakNightlySleep',
            'name' => 'Sufficient Sleep',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);

        Group::create([
            'category' => 'tweaks',
            'group_nid' => 'tweakNightlyTrendelenbrug', // [sic]
            'name' => 'Trendelenburg',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'serving_sizes' => "[]",
            'detail_types' => "[]",
            'per_day' => 1
        ]);
    }
}
