<?php

use App\Models\Category;
use App\Models\DetailType;
use App\Models\Group;
use App\Models\ServingSize;
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
        $daily_dozen = Category::create([
            'name' => 'daily_dozen',
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Beans',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Berries',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 1,
        ]);

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Other Fruits',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
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

        Group::create([
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

        Group::create([
            'category_id' => $daily_dozen->id,
            'name' => 'Whole Grains',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
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

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Negative Calorie Preload',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Incorporate Vinegar',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Undistracted Meals',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3,
        ]);

        Group::create([
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

        Group::create([
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

        Group::create([
            'category_id' => $tweaks->id,
            'name' => 'Green Tea',
            'icon_location' => '/img/dummy_icon.png',
            'banner_location' => '/img/dummy_banner.png',
            'per_day' => 3.,
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

        Group::create([
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
    }
}
