<?php

namespace Modules\Product\Services;

use Modules\Product\Entities\Product;

class ProductService
{
    public function getProducts()
    {
        return Product::all();
    }
}
