<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPost()
    {
        // $user = factory(App\User::class)->create();

        $this->visit('/login')
        ->type('test4', 'email')
        ->type('123456', 'password')
        ->press('Login')
        // ->withSession()
        ->visit('/acts/create')
        ->type('test5', 'title')
        ->type('test5', 'body')
        ->press('Submit')
        ->see('Activity Created');
    }
}
