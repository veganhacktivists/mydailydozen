<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_groups_move_to_the_webp_banners_and_back(): void
    {
        $beans = $this->makeGroup();
        $beans->forceFill(['banner_location' => 'img/groups/banner/beans.png'])->save();
        $exercise = $this->makeGroup();
        $exercise->forceFill(['banner_location' => '/img/groups/banner/exercise.jpg'])->save();
        $placeholder = $this->makeGroup();
        $placeholder->forceFill(['banner_location' => '/img/dummy_banner.png'])->save();
        $migration = require database_path('migrations/2026_09_26_000002_use_webp_group_banners.php');

        $migration->up();

        $this->assertSame('img/groups/banner/beans.webp', $beans->fresh()->banner_location);
        $this->assertSame('/img/groups/banner/exercise.webp', $exercise->fresh()->banner_location);
        $this->assertSame('/img/dummy_banner.png', $placeholder->fresh()->banner_location);
        foreach (['beans', 'exercise'] as $name) {
            $this->assertFileExists(public_path("img/groups/banner/$name.webp"));
        }

        $migration->down();

        $this->assertSame('img/groups/banner/beans.png', $beans->fresh()->banner_location);
        $this->assertSame('/img/groups/banner/exercise.jpg', $exercise->fresh()->banner_location);
    }
}
