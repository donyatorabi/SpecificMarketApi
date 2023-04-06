<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];
    public $timestamps = false;
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ArticleFactory::new();
    }

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
