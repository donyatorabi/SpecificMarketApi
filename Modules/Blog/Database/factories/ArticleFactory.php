<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\ArticleCategory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);

        return [
            'title'         => $title,
            'category_id'   => ArticleCategory::factory(),
            'content'       => $this->faker->paragraphs(6, true),
            'updated_at' => now()
        ];
    }
}
