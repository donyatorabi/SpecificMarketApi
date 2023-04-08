<?php

namespace Modules\Blog\Repositories;

interface ArticleRepositoryInterface
{
    /**
     * @param array|null $criteria
     * @param array|null $limitation
     * @return array|null
     */
    public function getList(array $criteria = null, array $limitation = null);

    /**
     * @param array|null $criteria
     * @return mixed
     */
    public function getTotalList(array $criteria = null);
}
