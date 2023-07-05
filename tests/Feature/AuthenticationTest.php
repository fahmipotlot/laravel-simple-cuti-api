<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test login.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'amirfahmi8@gmail.com',
            'password' => bcrypt('password')
        ]);

        $userData = [
            "email" => "amirfahmi8@gmail.com",
            "password" => "password"
        ];

        $this->json("POST", "api/login", $userData, ["Accept" => "application/json"])
            ->assertStatus(200)
            ->assertJsonStructure([
                "id",
                "name",
                "email",
                "email_verified_at",
                "created_at",
                "updated_at",
                "token"
            ]);

        $this->assertAuthenticated();
    }
}
