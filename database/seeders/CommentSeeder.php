<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ArticlesSeeder::class
        ]);
        $faker = Faker::create();

        $articles = Article::all();
        foreach ($articles as $article) {
            for ($i = 0; $i < 10; $i++) {
                Comment::create([
                    'article_id' => $article->id,
                    'contenuComment' => $faker->sentence,
                    'date' => $faker->date,
                ]);
            }
        }
    }
}

