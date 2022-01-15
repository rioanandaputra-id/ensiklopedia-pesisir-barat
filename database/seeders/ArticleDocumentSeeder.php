<?php

namespace Database\Seeders;

use App\Models\ArticleDocument;
use Illuminate\Database\Seeder;

class ArticleDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleDocument::factory(500)->create();
    }
}
