<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;


class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(100)->create();
        $articles = Article::factory()->count(100)->create();
        $articles->each(function ($article) use ($tags) {
            $article->tags()->attach(
                $tags->random(rand(1,10))->pluck('id')->toArray()
            );
        });
    }
}
