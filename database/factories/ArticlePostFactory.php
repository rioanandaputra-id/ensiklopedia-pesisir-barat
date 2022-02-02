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
        $category = DB::table('article_categorys')->select('id')->inRandomOrder()->first();
        $user = DB::table('users')->select('id')->inRandomOrder()->first();

        $title = $this->faker->sentence(mt_rand(2, 8));
        $string = Str::upper(Str::substr($title, 0, 1));
        $indexx = DB::table('article_indexs')->where('indexx', $string)->select('id')->first();

        return [
            'id' => $this->faker->uuid3(),
            'article_category_id' => $category->id,
            'article_index_id' => $indexx->id,
            'user_id' => $user->id,
            'title' => $title,
            // 'content' => NULL,
            'content' => $this->faker->paragraph(mt_rand(20, 200)),
            'views' => $this->faker->numberBetween(0, 2000),
            'status' => $this->faker->randomElement(['Tunggu', 'Terbit', 'Arsip'])
        ];
    }
}
