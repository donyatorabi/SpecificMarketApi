<?php

namespace Modules\Blog\Services;

interface ArticleServiceInterface
{
    /**
     * @param array|null $filters
     * @return array|null
     */
    public function getList(array $filters = null);
}
