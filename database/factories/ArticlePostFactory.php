<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticlePostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = DB::table('article_categorys')->select('article_category_id')->inRandomOrder()->first();
        $index = DB::table('article_indexs')->select('article_index_id')->inRandomOrder()->first();
        $user = DB::table('users')->select('user_id')->inRandomOrder()->first();

        return [
            'article_post_id' => $this->faker->uuid(),
            'article_category_id' => $category->article_category_id,
            'article_index_id' => $index->article_index_id,
            'user_id' => $user->user_id,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'content' => $this->faker->paragraph(mt_rand(20, 200)),
            'views' => $this->faker->numberBetween(0, 2000),
        ];
    }
}
