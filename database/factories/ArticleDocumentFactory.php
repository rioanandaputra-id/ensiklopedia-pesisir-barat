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
        $post = DB::table('article_posts')->select('article_post_id')->inRandomOrder()->first();
        return [
            'article_document_id' => $this->faker->uuid(),
            'article_post_id' => $post->article_post_id,
            'name' => $this->faker->sentence(2, true),
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
            'type' => 'image',
            'uploded' => 0
        ];
    }
}
