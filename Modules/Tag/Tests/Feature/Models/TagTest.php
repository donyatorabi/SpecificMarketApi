<?php

namespace Modules\Tag\Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Article;
use Modules\Tag\Entities\Tag;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class TagTest extends TestCase
{
    use ModelHelperTesting;

    protected function model(): Model
    {
        return new Tag();
    }

    public function testTagRelationshipWithArticle()
    {
        $count = rand(1, 10);

        $tag = Tag::factory()
            ->hasArticles($count)
            ->create();

        $this->assertCount($count, $tag->articles);
        $this->assertTrue($tag->articles->first() instanceof Article);
    }
}
