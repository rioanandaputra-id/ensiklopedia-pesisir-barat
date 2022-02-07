<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use App\Models\ArticleIndex;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticlePostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = ArticleCategory::inRandomOrder()->first();
        $user = UserAccount::inRandomOrder()->first();

        $title = $this->faker->sentence(mt_rand(2, 8));
        $string = Str::upper(Str::substr($title, 0, 1));
        $index = ArticleIndex::where('indexx', $string)->first();

        $paragraph_1 = '<p style="text-align: justify;">' . $this->faker->paragraph(mt_rand(20, 50)). '</p>';
        $paragraph_2 = '<br /><p style="text-align: justify;">' . $this->faker->paragraph(mt_rand(20, 60)). '</p>';

        $image_1 = '<br /><center><img src="' . $this->faker->imageUrl(750, 292, 'animals', true) . '" width="750px" height="292px" /></center><br />';
        $image_2 = '<br /><img src="' . $this->faker->imageUrl(750, 292, 'animals', true) . '" width="750px" height="292px" /><br />';

        $artikel = $image_1 . $paragraph_1 . $image_2 . $paragraph_2;

        return [
            'id' => $this->faker->uuid3(),
            'article_category_id' => $category->id,
            'article_index_id' => $index->id,
            'user_account_id' => $user->id,
            'title' => $title,
            'body' => $artikel,
            'views' => $this->faker->numberBetween(0, 2000),
            'status' => $this->faker->randomElement(['Tunggu', 'Terbit', 'Arsip'])
        ];
    }
}
