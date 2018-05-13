<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUser()
    {
        $this->visit('/register')
            ->type('testuser', 'name')
            ->type('testuser9@email.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/dashboard');
    }

    // public function testLoginPost(){
    //     Session::start();
    //     $response = $this->call('POST', '/login', [
    //         'email' => 'testuser@email.com',
    //         'password' => 'testuser',
    //         '_token' => csrf_token()
    //     ]);
    //     $this->assertEquals(200, $response->getStatusCode());
    //     $this->assertEquals('auth.login', $response->original->name());
    // }
}
