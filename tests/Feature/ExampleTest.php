<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Right now we redirect to the login screen.
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
