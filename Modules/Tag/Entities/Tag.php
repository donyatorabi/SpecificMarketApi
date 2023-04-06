<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Article;
use Modules\Product\Entities\Product;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    protected static function newFactory()
    {
        return \Modules\Tag\Database\factories\TagFactory::new();
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
