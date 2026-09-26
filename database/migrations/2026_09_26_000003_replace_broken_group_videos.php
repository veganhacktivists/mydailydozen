<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    // Private on YouTube, a placeholder, or an ID missing its leading dash; each is swapped for a NutritionFacts.org video on the same food
    private const VIDEOS = [
        'Beans' => ['https://www.youtube.com/embed/_lcCKrLl7Ow', 'https://www.youtube.com/embed/KVYmfTTw7_g'],
        'Berries' => ['example.com', 'https://www.youtube.com/embed/qCwhOWVCMdk'],
        'Other Vegetables' => ['https://www.youtube.com/embed/mOYGq24xQc', 'https://www.youtube.com/embed/-mOYGq24xQc'],
        'Sufficient Sleep' => ['https://www.youtube.com/embed/FIRlkBh2ZDo', 'https://www.youtube.com/embed/4oNB4TVCpqM'],
    ];

    public function up()
    {
        $this->swap(fn ($broken, $fixed) => [$broken, $fixed]);
    }

    public function down()
    {
        $this->swap(fn ($broken, $fixed) => [$fixed, $broken]);
    }

    private function swap(callable $pair)
    {
        foreach (self::VIDEOS as $group => $videos) {
            [$from, $to] = $pair(...$videos);

            DB::table('detail_types')
                ->whereIn('group_id', DB::table('groups')->where('name', $group)->select('id'))
                ->where('video', $from)
                ->update(['video' => $to]);
        }
    }
};
