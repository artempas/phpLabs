<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Article::class;
    public function definition(): array
    {
        $title = fake()->sentence;
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'author' => fake()->name,
            'content' => fake()->paragraphs,
            'slug' => $slug,
            'created_at' => fake()->dateTimeThisYear()
        ];
    }
}
