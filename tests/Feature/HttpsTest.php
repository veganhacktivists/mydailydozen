<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use Tests\TestCase;

class HttpsTest extends TestCase
{
    public function test_production_links_and_redirects_use_https(): void
    {
        $this->app['env'] = 'production';
        (new AppServiceProvider($this->app))->boot();

        $this->assertStringStartsWith('https://', url('/'));
        $this->get('/groups')->assertRedirect()->assertHeader('Location', url('/login'));
        $this->assertStringStartsWith('https://', route('password.reset', ['token' => 'abc']));
    }

    public function test_local_links_keep_the_request_scheme(): void
    {
        $this->assertStringStartsWith('http://', url('/'));
    }
}
