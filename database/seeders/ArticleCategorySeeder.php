<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\ArticleCategory;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = [
            ['article_category_id' => Uuid::uuid4(), 'name' => 'agama'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'bahasa'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'budaya'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'ekonomi'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'kuliner'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'olahraga'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'pemeritahan'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'pendidikan'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'perikanan'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'pertanian'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'peternakan'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'sejarah'],
            ['article_category_id' => Uuid::uuid4(), 'name' => 'wisata']
        ];

        foreach($categorys as $category){
            ArticleCategory::create($category);
        }
    }
}
