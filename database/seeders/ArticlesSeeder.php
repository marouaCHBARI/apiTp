<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = Article::create([
                'titre' => $faker->sentence,
                'contenu' => $faker->sentence,
                'datePublication' => $faker->date, 
            ]);

            
        }
    }
}