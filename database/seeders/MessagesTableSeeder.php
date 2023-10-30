<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::truncate();

        for ($i = 1; $i < 101; $i++) {
            Message::create([
                'name' => 'User ' . $i,
                'email' => 'user_' .  $i . '@billingsystem.test',
                'message' => 'User ' .  $i . ' message.',
                'created_at' => Carbon::now()->subDays(100)->addDays($i)
            ]);
        }
    }
}
