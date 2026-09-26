<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_each_public_page_is_its_own_canonical_url(): void
    {
        foreach (['/', '/login', '/register', '/contact'] as $path) {
            $this->get($path.'?utm_source=test')
                ->assertOk()
                ->assertSee('<link rel="canonical" href="'.url($path).'" />', false)
                ->assertSee('<meta property="og:url" content="'.url($path).'" />', false);
        }
    }

    public function test_the_sign_in_pages_have_their_own_titles(): void
    {
        config(['app.name' => 'My Daily Dozen']);

        $this->get('/login')->assertSee('<title>Login – My Daily Dozen</title>', false);
        $this->get('/register')->assertSee('<title>Register – My Daily Dozen</title>', false);
        $this->get('/forgot-password')->assertSee('<title>Forgot your password? – My Daily Dozen</title>', false);
    }

    public function test_the_homepage_has_one_main_heading(): void
    {
        $html = $this->get('/')->getContent();

        $this->assertSame(1, substr_count($html, '<h1'));
    }

    public function test_pages_reached_by_a_link_or_code_are_kept_out_of_search(): void
    {
        $this->get('/reset-password/token?email=a@example.com')->assertSee('<meta name="robots" content="noindex" />', false);
        $this->get('/')->assertDontSee('noindex', false);
    }

    public function test_the_sitemap_lists_the_public_pages(): void
    {
        $sitemap = file_get_contents(public_path('sitemap.xml'));

        foreach (['/', '/register', '/login', '/contact'] as $path) {
            $this->assertStringContainsString('<loc>https://mydailydozen.org'.($path === '/' ? '/' : $path).'</loc>', $sitemap);
        }
        $this->assertStringContainsString('Sitemap: https://mydailydozen.org/sitemap.xml', file_get_contents(public_path('robots.txt')));
    }
}
