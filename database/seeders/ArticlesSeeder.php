<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;

class ArticlesSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = Article::create([
                'title' => $faker->sentence,
                'content' => $faker->sentence,
                'publication_date' => $faker->date, 
            ]);

            
        }
    }
}