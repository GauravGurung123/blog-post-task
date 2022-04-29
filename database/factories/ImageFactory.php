<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => '/images/avatars/01.png',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\User',
        ];
    }
}
