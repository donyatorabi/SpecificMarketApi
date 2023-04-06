<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ArticleCategoryFactory::new();
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
