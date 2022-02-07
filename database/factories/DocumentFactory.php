<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid3(),
            'title' => $this->faker->sentence(2, true),
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
            'type' => 'image',
            'uploaded' => 0
        ];
    }
}
