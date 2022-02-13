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
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'A'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'B'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'C'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'D'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'E'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'F'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'G'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'H'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'I'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'J'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'K'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'L'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'M'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'N'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'O'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'P'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'Q'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'R'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'S'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'T'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'U'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'V'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'W'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'X'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'Y'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => 'Z'],
            ['id' => strval(Uuid::uuid4()), 'indexx' => '0-9'],
        ];

        foreach($indexs as $index){
            ArticleIndex::insert($index);
        }
    }
}
