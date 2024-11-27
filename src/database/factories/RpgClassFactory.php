<?php

namespace Database\Factories;

use App\Models\RpgClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class RpgClassFactory extends Factory
{
    protected $model = RpgClass::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
        ];
    }
}