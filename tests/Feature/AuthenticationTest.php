<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cuti;
use Laravel\Sanctum\Sanctum;

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

    /**
     * A basic feature test login.
     *
     * @return void
     */
    public function testLoginWithNotRegisteredCredential()
    {
        $userData = [
            "email" => "amirfahmi8@gmail.com",
            "password" => "password"
        ];

        $this->json("POST", "api/login", $userData, ["Accept" => "application/json"])
            ->assertStatus(401)
            ->assertJsonStructure([
                "message"
            ]);
    }

    /**
     * A basic feature test login.
     *
     * @return void
     */
    public function testLoginWithWrongCredential()
    {
        $user = factory(User::class)->create([
            'email' => 'amirfahmi8@gmail.com',
            'password' => bcrypt('password')
        ]);

        $userData = [
            "email" => "amirfahmi8@gmail.com",
            "password" => "passwordsalah"
        ];

        $this->json("POST", "api/login", $userData, ["Accept" => "application/json"])
            ->assertStatus(401)
            ->assertJsonStructure([
                "message"
            ]);
    }

    /**
     * A basic feature test profile user.
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(User::class)->create([
            'email' => 'amirfahmi8@gmail.com',
            'password' => bcrypt('password')
        ]);

        Sanctum::actingAs(
            $user
        );

        $data = [
            "start_at" => "2023-12-06 00:00:00",
            "end_at" => "2023-12-07 00:00:00",
            "reason" => "cuti menikah",
            "user_id" => $user->id
        ];

        $cuti = factory(Cuti::class)->create($data);

        $this->json("GET", "api/profile", ["Accept" => "application/json"])
            ->assertStatus(200)
            ->assertJsonStructure([
                "id",
                "name",
                "email",
                "email_verified_at",
                "created_at",
                "updated_at",
                "cutis" => [
                    "*" => [
                        "approved",
                        "start_at",
                        "end_at",
                        "reason",
                        "created_at",
                        "updated_at",
                        "user_id",
                        "id"
                    ]
                ]
            ]);
    }
}
