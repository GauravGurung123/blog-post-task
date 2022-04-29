<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->numberBetween(0,1),
        ];
    }
}
