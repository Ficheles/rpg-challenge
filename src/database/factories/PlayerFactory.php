<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\RpgClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'class_id' => RpgClass::factory(), 
            'xp' => $this->faker->numberBetween(1, 100),
            'confirmed' => false,
        ];
    }
}