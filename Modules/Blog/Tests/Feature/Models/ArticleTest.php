<?php

namespace Modules\Blog\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\ArticleCategory;
use Modules\Tag\Entities\Tag;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use ModelHelperTesting;

    protected function model(): Model
    {
        return new Article();
    }

    public function testArticleRelationshipWithArticleCategory()
    {
        $article = Article::factory()
            ->for(ArticleCategory::factory())
            ->create()
        ;

        $this->assertTrue(isset($article->articleCategory->id));
        $this->assertTrue($article->articleCategory instanceof ArticleCategory);
    }

    public function testArticleRelationshipWithTag()
    {
        $count = rand(1, 10);

        $article = Article::factory()
            ->hasTags($count)
            ->create();

        $this->assertCount($count, $article->tags);
        $this->assertTrue($article->tags->first() instanceof Tag);
    }
}
