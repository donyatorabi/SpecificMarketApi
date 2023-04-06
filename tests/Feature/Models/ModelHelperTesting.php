<?php

namespace Tests\Feature\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Article;

trait ModelHelperTesting
{
    public function testInsertData()
    {
        $model  = $this->model();
        $data   = $model::factory()->make()->toArray();
        $model::create($data);

        $this->assertDatabaseHas($model->getTable(), $data);
    }

    abstract protected function model(): Model;
}
