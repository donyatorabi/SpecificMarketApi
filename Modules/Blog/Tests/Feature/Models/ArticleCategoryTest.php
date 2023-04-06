<?php

namespace Modules\Blog\Tests\Feature\Models;

use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\ArticleCategory;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class ArticleCategoryTest extends TestCase
{
    public function testInsertData()
    {
        $data = ArticleCategory::factory()->make()->toArray();
        ArticleCategory::create($data);

        $this->assertDatabaseHas('article_categories', $data);
    }

    public function testArticleCategoryRelationshipWithArticle()
    {
        $count = rand(0, 10);

        $articleCategory = ArticleCategory::factory()
                            ->hasArticles($count)
                            ->create();
        ;

        $this->assertCount($count, $articleCategory->articles);
        $this->assertTrue($articleCategory->articles->first() instanceof Article);
    }
}
