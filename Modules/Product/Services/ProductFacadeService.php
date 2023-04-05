<?php

namespace Modules\Product\Services;

class ProductFacadeService
{
    protected ProductLazyService $productLazyService;

    public function __construct(ProductLazyService $productLazyService)
    {
        $this->productLazyService = $productLazyService;
    }

    public function getProducts()
    {
        return $this->productLazyService->getProductService()->getProducts();
    }
}
