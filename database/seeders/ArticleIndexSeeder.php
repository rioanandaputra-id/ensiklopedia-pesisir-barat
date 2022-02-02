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
            ['id' => Uuid::uuid4(), 'indexx' => 'A'],
            ['id' => Uuid::uuid4(), 'indexx' => 'B'],
            ['id' => Uuid::uuid4(), 'indexx' => 'C'],
            ['id' => Uuid::uuid4(), 'indexx' => 'D'],
            ['id' => Uuid::uuid4(), 'indexx' => 'E'],
            ['id' => Uuid::uuid4(), 'indexx' => 'F'],
            ['id' => Uuid::uuid4(), 'indexx' => 'G'],
            ['id' => Uuid::uuid4(), 'indexx' => 'H'],
            ['id' => Uuid::uuid4(), 'indexx' => 'I'],
            ['id' => Uuid::uuid4(), 'indexx' => 'J'],
            ['id' => Uuid::uuid4(), 'indexx' => 'K'],
            ['id' => Uuid::uuid4(), 'indexx' => 'L'],
            ['id' => Uuid::uuid4(), 'indexx' => 'M'],
            ['id' => Uuid::uuid4(), 'indexx' => 'N'],
            ['id' => Uuid::uuid4(), 'indexx' => 'O'],
            ['id' => Uuid::uuid4(), 'indexx' => 'P'],
            ['id' => Uuid::uuid4(), 'indexx' => 'Q'],
            ['id' => Uuid::uuid4(), 'indexx' => 'R'],
            ['id' => Uuid::uuid4(), 'indexx' => 'S'],
            ['id' => Uuid::uuid4(), 'indexx' => 'T'],
            ['id' => Uuid::uuid4(), 'indexx' => 'U'],
            ['id' => Uuid::uuid4(), 'indexx' => 'V'],
            ['id' => Uuid::uuid4(), 'indexx' => 'W'],
            ['id' => Uuid::uuid4(), 'indexx' => 'X'],
            ['id' => Uuid::uuid4(), 'indexx' => 'Y'],
            ['id' => Uuid::uuid4(), 'indexx' => 'Z'],
            ['id' => Uuid::uuid4(), 'indexx' => '0-9'],
        ];

        foreach($indexs as $index){
            ArticleIndex::insert($index);
        }
    }
}
