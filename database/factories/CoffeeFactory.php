<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tastes = ['Sangat Pahit', 'Pahit', 'Seimbang', 'Manis', 'Sangat Manis'];
        $intensities = ['Sangat Ringan', 'Ringan', 'Sedang', 'Kuat', 'Sangat Kuat'];
        $sweetness = ['Tanpa Gula', 'Sedikit Manis', 'Sedang', 'Manis', 'Sangat Manis'];
        $milkLevels = ['Tanpa Susu', 'Sedikit', 'Sedang', 'Banyak', 'Sangat Banyak'];

        return [
            'name' => fake()->word,
            'price' => fake()->numberBetween(10000, 250000),
            'description' => fake()->text,
            'taste' => fake()->randomElement($tastes),
            'intensity' => fake()->randomElement($intensities),
            'sweetness' => fake()->randomElement($sweetness),
            'milk_level' => fake()->randomElement($milkLevels),
            'beans_type' => fake()->word,
            'image_url' => fake()->imageUrl,
        ];
    }
}
