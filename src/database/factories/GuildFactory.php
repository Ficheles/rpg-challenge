<?php

namespace Database\Factories;

use App\Models\Guild;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuildFactory extends Factory
{
    protected $model = Guild::class;

    public function definition()
    {
        $guildNamePrefixes = ['Shadow', 'Fire', 'Iron', 'Mystic', 'Silver', 'Golden'];
        $guildNameSuffixes = ['Knights', 'Wizards', 'Rangers', 'Warriors', 'Legion', 'Clan'];

        return [
            'name' => $this->faker->unique()->randomElement($guildNamePrefixes) . ' ' . $this->faker->randomElement($guildNameSuffixes),
            // 'description' => $this->faker->paragraph()
        ];
    }
}