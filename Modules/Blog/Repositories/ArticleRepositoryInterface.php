<?php

namespace Modules\Blog\Repositories;

interface ArticleRepositoryInterface
{
    /**
     * @param array|null $criteria
     * @return array|null
     */
    public function getList(array $criteria = null);
}
