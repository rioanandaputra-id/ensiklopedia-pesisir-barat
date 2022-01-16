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
            ['id' => Uuid::uuid4(), 'name' => 'A'],
            ['id' => Uuid::uuid4(), 'name' => 'B'],
            ['id' => Uuid::uuid4(), 'name' => 'C'],
            ['id' => Uuid::uuid4(), 'name' => 'D'],
            ['id' => Uuid::uuid4(), 'name' => 'E'],
            ['id' => Uuid::uuid4(), 'name' => 'F'],
            ['id' => Uuid::uuid4(), 'name' => 'G'],
            ['id' => Uuid::uuid4(), 'name' => 'H'],
            ['id' => Uuid::uuid4(), 'name' => 'I'],
            ['id' => Uuid::uuid4(), 'name' => 'J'],
            ['id' => Uuid::uuid4(), 'name' => 'K'],
            ['id' => Uuid::uuid4(), 'name' => 'L'],
            ['id' => Uuid::uuid4(), 'name' => 'M'],
            ['id' => Uuid::uuid4(), 'name' => 'N'],
            ['id' => Uuid::uuid4(), 'name' => 'O'],
            ['id' => Uuid::uuid4(), 'name' => 'P'],
            ['id' => Uuid::uuid4(), 'name' => 'Q'],
            ['id' => Uuid::uuid4(), 'name' => 'R'],
            ['id' => Uuid::uuid4(), 'name' => 'S'],
            ['id' => Uuid::uuid4(), 'name' => 'T'],
            ['id' => Uuid::uuid4(), 'name' => 'U'],
            ['id' => Uuid::uuid4(), 'name' => 'V'],
            ['id' => Uuid::uuid4(), 'name' => 'W'],
            ['id' => Uuid::uuid4(), 'name' => 'X'],
            ['id' => Uuid::uuid4(), 'name' => 'Y'],
            ['id' => Uuid::uuid4(), 'name' => 'Z'],
            ['id' => Uuid::uuid4(), 'name' => '0-9'],
        ];

        foreach($indexs as $index){
            ArticleIndex::create($index);
        }
    }
}
