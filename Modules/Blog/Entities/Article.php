<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tag\Entities\Tag;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ArticleFactory::new();
    }

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
