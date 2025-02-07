<?php

namespace Database\Factories;

use App\Models\Smartphone;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmartphoneFactory extends Factory
{
    protected $model = Smartphone::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'marque' => $this->faker->company(),
            'description' => $this->faker->text(),
            'prix' => $this->faker->randomFloat(2, 100, 2000),
            'photo' => $this->faker->imageUrl(),
            'ram' => $this->faker->randomElement(['4GB', '6GB', '8GB']),
            'rom' => $this->faker->randomElement(['64GB', '128GB', '256GB']),
            'ecran' => $this->faker->randomElement(['5.5"', '6.1"', '6.7"']),
            'couleurs_disponibles' => $this->faker->colorName(),
        ];
    }
}
