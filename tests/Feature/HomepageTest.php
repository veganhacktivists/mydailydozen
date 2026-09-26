<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_the_first_photo_loads_straight_away(): void
    {
        $this->withoutVite();
        $html = $this->get('/')->assertOk()->getContent();

        preg_match_all('/<img\s+class="slides"[^>]*>/', $html, $slides);

        $this->assertCount(4, $slides[0]);
        $this->assertStringContainsString('fetchpriority="high"', $slides[0][0]);
        $this->assertStringContainsString('display: block', $slides[0][0]);
        foreach (array_slice($slides[0], 1) as $slide) {
            $this->assertStringContainsString('loading="lazy"', $slide);
            $this->assertStringContainsString('display: none', $slide);
        }
        $this->assertStringContainsString('800w', $slides[0][0]);
    }

    public function test_the_slide_buttons_have_labels(): void
    {
        $this->withoutVite();

        $this->get('/')->assertSee('aria-label="Show blueberries"', false)->assertSee('aria-label="Show ingredients"', false);
    }
}
