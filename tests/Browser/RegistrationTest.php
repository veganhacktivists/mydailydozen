<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * My test implementation
     * @param Browser $browser
     * @throws \Throwable
     */
    public function testRegistration()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register');
            $browser->type('name', 'test');
            $browser->type('email', 'test@example.com');
            $browser->type('password', '12345678');
            $browser->type('password_confirmation', '12345678');
            $browser->press('REGISTER');
            // If this much works we know the page at least renders :)
            // Feel free to add more :D
            $this->assertTrue(true);
        });
    }
}
