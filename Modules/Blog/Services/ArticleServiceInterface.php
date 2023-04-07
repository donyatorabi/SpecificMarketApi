<?php

namespace Modules\Blog\Services;

interface ArticleServiceInterface
{
    /**
     * @param array $columns
     * @param array|null $criteria
     * @return array|null
     */
    public function getList(array $columns, array $criteria = null);
}
