<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email' => 'amirfahmi8@gmail.com'], [
            'email' => 'amirfahmi8@gmail.com',
            'name' => 'Fahmi Amiruddin Nafi',
            'password' => bcrypt('password')
        ]);

        factory(User::class, 10)->create()->each(function(User $user) {
            factory(App\Models\Cuti::class, 5)->create(['user_id' => $user->id]);
        });
    }
}
