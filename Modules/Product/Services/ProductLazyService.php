<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\App;
use Modules\Product\Providers\ProductServiceProvider;

class ProductLazyService implements ProductLazyServiceInterface
{
    protected $app;

    public function __construct()
    {
        $this->app = App::getFacadeRoot();
    }

    public function getProductService(): ProductService
    {
        return $this->app->get('productService');
    }
}
