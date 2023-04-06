<?php

namespace Modules\Tag\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Blog\Entities\Article;
use Modules\Product\Entities\Product;
use Modules\Tag\Entities\Tag;

class TaggableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Tag\Entities\Taggable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $taggable = $this->taggable();

        return [
            'tag_id'        => Tag::factory(),
            'taggable_id'   => $taggable::factory(),
            'taggable_type' => $taggable
        ];
    }

    public function taggable()
    {
        return $this->faker->randomElement([
            Article::class,
            Product::class
        ]);
    }
}
