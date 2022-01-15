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
            ['id' => Uuid::uuid4(), 'name' => 'agama'],
            ['id' => Uuid::uuid4(), 'name' => 'bahasa'],
            ['id' => Uuid::uuid4(), 'name' => 'budaya'],
            ['id' => Uuid::uuid4(), 'name' => 'ekonomi'],
            ['id' => Uuid::uuid4(), 'name' => 'kuliner'],
            ['id' => Uuid::uuid4(), 'name' => 'olahraga'],
            ['id' => Uuid::uuid4(), 'name' => 'pemeritahan'],
            ['id' => Uuid::uuid4(), 'name' => 'pendidikan'],
            ['id' => Uuid::uuid4(), 'name' => 'perikanan'],
            ['id' => Uuid::uuid4(), 'name' => 'pertanian'],
            ['id' => Uuid::uuid4(), 'name' => 'peternakan'],
            ['id' => Uuid::uuid4(), 'name' => 'sejarah'],
            ['id' => Uuid::uuid4(), 'name' => 'wisata']
        ];

        ArticleCategory::insert($categorys);
    }
}
