<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        
        $faker = Faker::create();

        $articles = Article::all();
        foreach ($articles as $article) {
            for ($i = 0; $i < 10; $i++) {
                Comment::create([
                    'article_id' => $article->id,
                    'content_comment' => $faker->sentence,
                    'date' => $faker->date,
                ]);
            }
        }
    }
}

