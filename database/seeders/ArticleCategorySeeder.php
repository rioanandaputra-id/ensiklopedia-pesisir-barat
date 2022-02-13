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
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'agama'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'bahasa'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'budaya'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'ekonomi'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'kuliner'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'olahraga'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'pemeritahan'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'pendidikan'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'perikanan'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'pertanian'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'peternakan'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'sejarah'],
            ['id' => strval(Uuid::uuid4()), 'categoryy' => 'wisata']
        ];

        foreach($categorys as $category){
            ArticleCategory::insert($category);
        }
    }
}
