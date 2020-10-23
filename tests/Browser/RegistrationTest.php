<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            eval(\Psy\sh());
            $browser->visit('/register');
            $browser->type('name', 'test');
            $browser->type('email', 'email@example.com');
            $browser->type('password', '12345678');
            $browser->type('password_confirmation', '12345678');
            $browser->press('Register');
            // On groups index
            $browser->assertSee('Home');
            // Can see default groups
            $browser->assertSee('Blueberries');
        });
    }
}
