<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Password>
 */
class PasswordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'place' => fake()->word(),
            'username' => fake()->name(),
            'password' => fake()->password(),
            'url' => fake()->url(),
            'category' => fake()->word(),   
            'user_id' => 1,
        ];
    }
}
