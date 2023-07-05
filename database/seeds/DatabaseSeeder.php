<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\User::factory(20)->create()
        //     ->each(function($user) {
        //     App\Models\Cuti::create([
        //         'user_id' => $user->id
        //     ]);
        // });
        factory(App\Models\User::class, 10)->create()->each(function(App\Models\User $user) {
            factory(App\Models\Cuti::class, 5)->create(['user_id' => $user->id]);
        });
    }
}
