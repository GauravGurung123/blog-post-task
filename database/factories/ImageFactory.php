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
            'path' => '/vendor/images/blog/blog-1.jpg',
            'imageable_id' => rand(1,10),
            'imageable_type' => 'App\Models\Blog',
        ];
    }
}
