<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticleDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = DB::table('article_posts')->select('id')->inRandomOrder()->first();
        return [
            'id' => $this->faker->uuid(),
            'article_post_id' => $post->id,
            'name' => $this->faker->sentence(2, true),
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
            'type' => 'image',
            'uploded' => 0
        ];
    }
}
