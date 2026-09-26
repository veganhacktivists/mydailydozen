<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_every_label_belongs_to_a_field(): void
    {
        $this->withoutVite();

        foreach (['/login', '/register', '/forgot-password'] as $path) {
            $html = $this->get($path)->assertOk()->getContent();

            preg_match_all('/<label[^>]*for="([^"]+)"/', $html, $labels);
            preg_match_all('/<input[^>]*id="([^"]+)"/', $html, $inputs);

            $this->assertNotEmpty($labels[1], $path);
            $this->assertEmpty(array_diff($labels[1], $inputs[1]), $path);
        }
    }
}
