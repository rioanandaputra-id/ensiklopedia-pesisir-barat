<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->sentence(2, true),
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
            'type' => 'image',
            'uploded' => 0
        ];
    }
}
