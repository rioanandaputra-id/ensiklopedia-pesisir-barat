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
            ['id' => Uuid::uuid4(), 'categoryy' => 'agama'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'bahasa'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'budaya'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'ekonomi'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'kuliner'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'olahraga'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'pemeritahan'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'pendidikan'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'perikanan'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'pertanian'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'peternakan'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'sejarah'],
            ['id' => Uuid::uuid4(), 'categoryy' => 'wisata']
        ];

        foreach($categorys as $category){
            ArticleCategory::insert($category);
        }
    }
}
