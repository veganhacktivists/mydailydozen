<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthTest extends TestCase
{
    use RefreshDatabase;

    public function test_up_reports_up_without_starting_a_session(): void
    {
        $this->get('/up')
            ->assertOk()
            ->assertExactJson(['status' => 'up'])
            ->assertHeader('Cache-Control', 'no-store, private')
            ->assertCookieMissing(config('session.cookie'))
            ->assertCookieMissing('XSRF-TOKEN');
    }
}
