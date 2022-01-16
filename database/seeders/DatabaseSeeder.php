<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArticleCategorySeeder::class,
            ArticleIndexSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ArticlePostSeeder::class,
            ArticleDocumentSeeder::class
        ]);
    }
}
