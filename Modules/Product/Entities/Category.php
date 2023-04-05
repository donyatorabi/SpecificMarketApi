<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
