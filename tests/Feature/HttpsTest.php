<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\Providers\AppServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class HttpsTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_reset_links_use_the_app_url_whatever_the_host(): void
    {
        Notification::fake();
        config(['app.url' => 'https://mydailydozen.org']);
        $this->app['env'] = 'production';
        (new AppServiceProvider($this->app))->boot();
        $user = $this->makeUser();

        $this->withoutMiddleware(VerifyCsrfToken::class)->post('https://attacker.example/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, fn ($reset) => str_starts_with($reset->toMail($user)->actionUrl, 'https://mydailydozen.org/'));
    }

    public function test_production_session_cookies_are_secure(): void
    {
        $env = $_SERVER['APP_ENV'] ?? null;
        $_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = 'production';

        try {
            $this->assertTrue((require config_path('session.php'))['secure']);
        } finally {
            $_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = $env;
        }

        $this->assertFalse((require config_path('session.php'))['secure']);
    }
}
