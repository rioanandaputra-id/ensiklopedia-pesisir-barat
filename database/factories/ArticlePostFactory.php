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
        $document = DB::table('article_documents')->select('id')->inRandomOrder()->first();
        $article = DB::table('articles')->select('id')->inRandomOrder()->first();

        return [
            'id' => $this->faker->uuid(),
            'article_id' => $article->id,
            'category_id' => $category->id,
            'index_id' => $index->id,
            'document_id' => $document->id,
            'user_id' => 1,
            'views' => $this->faker->numberBetween(0, 2000),
        ];
    }
}
