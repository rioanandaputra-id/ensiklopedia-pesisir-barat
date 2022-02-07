<?php

namespace Database\Seeders;

use App\Models\ArticlePost;
use Illuminate\Database\Seeder;

class ArticlePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticlePost::factory(10)->create();
    }
}
