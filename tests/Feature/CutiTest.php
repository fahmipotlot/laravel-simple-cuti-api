<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cuti;
use Laravel\Sanctum\Sanctum;
use Carbon\Carbon;

class CutiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCuti()
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
            "reason" => "cuti menikah"
        ];

        $this->json('POST', 'api/annual-leaves', $data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                "data" => [
                    "start_at" => "2023-12-06 00:00:00",
                    "end_at" => "2023-12-07 00:00:00",
                    "reason" => "cuti menikah",
                    "user_id" => 1,
                    "id" => 1
                ]
            ]);
    }

    public function testGetCuti()
    {
        $user = factory(User::class)->create([
            'email' => 'amirfahmi8@gmail.com',
            'password' => bcrypt('password')
        ]);

        Sanctum::actingAs(
            $user
        );

        $this->json('GET', 'api/annual-leaves', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "current_page",
                    "data" => [
                        "*" => [
                            "start_at",
                            "end_at",
                            "reason",
                            "user_id",
                            "created_at",
                            "updated_at",
                            "user_id",
                            "id"
                        ]
                    ],
                    "first_page_url",
                    "from",
                    "last_page",
                    "last_page_url",
                    "next_page_url",
                    "path",
                    "per_page",
                    "prev_page_url",
                    "to",
                    "total"
                ]
            ]);
    }

    public function testGetDetail()
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

        $this->json('GET', 'api/annual-leaves/1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "start_at",
                    "end_at",
                    "reason",
                    "user_id",
                    "created_at",
                    "updated_at",
                    "user_id",
                    "id"
                ]]);
    }
}
