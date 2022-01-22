<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\ArticleIndex;

class ArticleIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indexs = [
            ['article_index_id' => Uuid::uuid4(), 'name' => 'A'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'B'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'C'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'D'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'E'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'F'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'G'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'H'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'I'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'J'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'K'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'L'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'M'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'N'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'O'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'P'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'Q'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'R'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'S'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'T'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'U'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'V'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'W'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'X'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'Y'],
            ['article_index_id' => Uuid::uuid4(), 'name' => 'Z'],
            ['article_index_id' => Uuid::uuid4(), 'name' => '0-9'],
        ];

        foreach($indexs as $index){
            ArticleIndex::create($index);
        }
    }
}
