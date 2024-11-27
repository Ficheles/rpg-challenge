<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        Player::factory()->count(15)->create()->each(function ($player, $index) {
            if ($index < 0.7 * 15) {
                $player->update(['confirmed' => true]);
            }
        });
    }
}
