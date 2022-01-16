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
        $category = DB::table('article_categorys')->select('id')->inRandomOrder()->first();
        $index = DB::table('article_indexs')->select('id')->inRandomOrder()->first();
        $user = DB::table('users')->select('id')->inRandomOrder()->first();

        return [
            'id' => $this->faker->uuid(),
            'category_id' => $category->id,
            'index_id' => $index->id,
            'user_id' => $user->id,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'content' => $this->faker->paragraph(mt_rand(20, 200)),
            'views' => $this->faker->numberBetween(0, 2000),
        ];
    }
}
