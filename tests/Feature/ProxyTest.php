<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ProxyTest extends TestCase
{
    private function ipFor(string $peer, ?string $forwardedFor = null): string
    {
        Route::get('/_test/ip', fn (Request $request) => $request->ip());

        return $this->flushHeaders()
            ->withServerVariables(['REMOTE_ADDR' => $peer])
            ->withHeaders($forwardedFor === null ? [] : ['X-Forwarded-For' => $forwardedFor])
            ->get('/_test/ip')
            ->getContent();
    }

    public function test_the_visitor_ip_comes_through_the_proxy_and_cloudflare(): void
    {
        config(['services.coolify_proxy_ips' => ['10.0.0.1']]);

        // 172.70.1.1 is a Cloudflare edge address, 10.0.0.1 the Coolify proxy
        $this->assertSame('203.0.113.7', $this->ipFor('10.0.0.1', '203.0.113.7, 172.70.1.1'));
        $this->assertSame('203.0.113.7', $this->ipFor('10.0.0.1', '198.51.100.9, 203.0.113.7, 172.70.1.1'));
        $this->assertSame('203.0.113.7', $this->ipFor('172.70.1.1', '203.0.113.7'));
    }

    public function test_a_forged_header_is_ignored(): void
    {
        config(['services.coolify_proxy_ips' => ['10.0.0.1']]);

        $this->assertSame('198.51.100.9', $this->ipFor('10.0.0.1', '203.0.113.7, 172.70.1.1, 198.51.100.9'));
        $this->assertSame('10.0.0.2', $this->ipFor('10.0.0.2', '198.51.100.9, 172.70.1.1'));
        $this->assertSame('10.0.0.1', $this->ipFor('10.0.0.1'));
    }

    public function test_without_the_proxy_setting_nothing_is_forwarded(): void
    {
        config(['services.coolify_proxy_ips' => []]);

        $this->assertSame('10.0.0.1', $this->ipFor('10.0.0.1', '203.0.113.7, 172.70.1.1'));
    }
}
