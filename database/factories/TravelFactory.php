<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isPublic = $this->faker->randomElement([true, false]);

        return [
            'is_public' => $isPublic,
            'name' => fake()->text(25),
            'description' => fake()->text(100),
            'number_of_days' => rand(1, 20),
        ];
    }
}
