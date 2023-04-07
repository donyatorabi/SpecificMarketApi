<?php

namespace Modules\Blog\Repositories;

interface ArticleRepositoryInterface
{
    /**
     * @param array $columns
     * @param array|null $criteria
     * @return array|null
     */
    public function getList(array $columns, array $criteria = null);
}
