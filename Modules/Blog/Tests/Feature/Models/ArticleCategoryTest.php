<?php

namespace Modules\Blog\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\ArticleCategory;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class ArticleCategoryTest extends TestCase
{
    use ModelHelperTesting;

    protected function model(): Model
    {
        return new ArticleCategory();
    }

    public function testArticleCategoryRelationshipWithArticle()
    {
        $count = rand(1, 10);

        $articleCategory = ArticleCategory::factory()
                            ->hasArticles($count)
                            ->create();
        ;

        $this->assertCount($count, $articleCategory->articles);
        $this->assertTrue($articleCategory->articles->first() instanceof Article);
    }
}
