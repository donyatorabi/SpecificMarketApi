<?php

namespace Modules\Blog\Tests\Feature\Models;

use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\ArticleCategory;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    public function testInsertData()
    {
        $data = Article::factory()->create()->toArray();

        Article::create($data);

        $this->assertDatabaseHas('articles', $data);
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
}
