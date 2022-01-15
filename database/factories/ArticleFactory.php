<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class ArticleFactory extends Factory
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
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'content' => $this->faker->paragraph(mt_rand(20, 200))
        ];
    }
}
