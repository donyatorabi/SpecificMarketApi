<?php

namespace Modules\Blog\Tests\Feature\Routes;

use Modules\Blog\Entities\Article;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->withoutExceptionHandling();

        $data       = Article::factory()->make()->toArray();
        $article    = Article::create($data);

        $response   = $this->getJson(route('articles'))
            ->assertStatus(200)
        ;

        $this->assertDatabaseHas('articles', $data);
    }

    public function testShow()
    {
        $data = Article::factory()->make()->toArray();
        $article = Article::create($data);

        $response = $this->getJson(route('articles.show', $article->id));

        $response->assertStatus(200);
        $this->assertNotEmpty($response['items']);
    }
}
