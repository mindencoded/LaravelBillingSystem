<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        //DB::table('role_user')->trincate();
        //Role::truncate();

        for ($i = 1; $i < 11; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user_' .  $i . '@billingsystem.test',
                'password' => bcrypt('password')
            ]);
        }
    }
}
