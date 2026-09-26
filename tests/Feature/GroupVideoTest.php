<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GroupVideoTest extends TestCase
{
    use RefreshDatabase;

    private function detailFor(string $group, string $video): int
    {
        $model = $this->makeGroup();
        $model->forceFill(['name' => $group])->save();

        return DB::table('detail_types')->insertGetId(['group_id' => $model->id, 'name' => $group, 'video' => $video]);
    }

    public function test_the_broken_videos_are_replaced_and_restored(): void
    {
        $beans = $this->detailFor('Beans', 'https://www.youtube.com/embed/_lcCKrLl7Ow');
        $berries = $this->detailFor('Berries', 'example.com');
        $edited = $this->detailFor('Sufficient Sleep', 'https://www.youtube.com/embed/someone-fixed');
        $migration = require database_path('migrations/2026_09_26_000003_replace_broken_group_videos.php');

        $migration->up();

        $video = fn (int $id) => DB::table('detail_types')->where('id', $id)->value('video');
        $this->assertSame('https://www.youtube.com/embed/KVYmfTTw7_g', $video($beans));
        $this->assertSame('https://www.youtube.com/embed/qCwhOWVCMdk', $video($berries));
        $this->assertSame('https://www.youtube.com/embed/someone-fixed', $video($edited));

        $migration->down();

        $this->assertSame('https://www.youtube.com/embed/_lcCKrLl7Ow', $video($beans));
        $this->assertSame('example.com', $video($berries));
    }
}
