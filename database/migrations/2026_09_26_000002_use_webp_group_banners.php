<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    // The originals stay in public/img/groups/banner, so rolling back is safe
    private const BANNERS = [
        'beans.png', 'beverages.png', 'black_cumin.png', 'exercise.jpg', 'exercising_timing.png',
        'fast_after_7_00_p_m.png', 'flaxseeds.png', 'front_load_calories.png', 'green_tea.png',
        'greens.png', 'herbs_and_spices.png', 'nuts_and_seeds.png', 'other_vegetables.png',
        'sufficient_sleep.png', 'trendelenburg.png', 'twenty_minute_rule.png',
        'undistracted_meals.png', 'vitamin_d.png',
    ];

    public function up()
    {
        $this->swap(fn ($file) => [$file, preg_replace('/\.(png|jpg)$/', '.webp', $file)]);
    }

    public function down()
    {
        $this->swap(fn ($file) => [preg_replace('/\.(png|jpg)$/', '.webp', $file), $file]);
    }

    private function swap(callable $pair)
    {
        foreach (self::BANNERS as $file) {
            [$from, $to] = $pair($file);

            foreach (['img/groups/banner/', '/img/groups/banner/'] as $dir) {
                DB::table('groups')->where('banner_location', $dir.$from)->update(['banner_location' => $dir.$to]);
            }
        }
    }
};
