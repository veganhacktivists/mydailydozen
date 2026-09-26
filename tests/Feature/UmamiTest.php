<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UmamiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_nothing_loads_without_a_website_id(): void
    {
        config(['services.umami.website_id' => null]);

        $this->get('/')->assertDontSee('analytics.veganhacktivists.org', false);
    }

    public function test_pages_load_umami_once_a_website_id_is_set(): void
    {
        config(['services.umami.website_id' => 'site-id']);

        $this->get('/')->assertSee('data-website-id="site-id"', false);
        $this->actingAs($this->makeUser())->get('/groups')->assertSee('data-website-id="site-id"', false);
    }

    public function test_the_password_reset_page_is_left_out(): void
    {
        config(['services.umami.website_id' => 'site-id']);

        $this->get('/reset-password/token?email=a@example.com')->assertDontSee('data-website-id', false);
    }
}
