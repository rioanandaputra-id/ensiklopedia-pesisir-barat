<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $user = DB::table('users')->select('user_id')->inRandomOrder()->first();

        $title = $this->faker->sentence(mt_rand(2, 8));
        $string = Str::upper(Str::substr($title, 0, 1));
        $index = DB::table('article_indexs')->where('name', $string)->select('article_index_id')->first();

        return [
            'article_post_id' => $this->faker->uuid3(),
            'article_category_id' => $category->article_category_id,
            'article_index_id' => $index->article_index_id,
            'user_id' => $user->user_id,
            'title' => $title,
            'content' => NULL,
            // 'content' => $this->faker->paragraph(mt_rand(20, 200)),
            'views' => $this->faker->numberBetween(0, 2000),
        ];
    }
}
