<?php

namespace Modules\Blog\Repositories;

use \Illuminate\Database\Eloquent\Builder;
use Modules\Blog\Entities\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @see ArticleRepositoryInterface::getList()
     */
    public function getList(array $criteria = null)
    {
        $qb = Article::query()
            ->join('article_categories as ac', 'articles.category_id', '=', 'ac.id')
            ->select(['articles.id', 'category_id', 'ac.title as category_name', 'articles.title', 'content'])
        ;

        if (!empty($criteria)) {
            $qb = $this->__addFilters($qb, $criteria);
        }

        return $qb->get()->toArray();
    }

    /**
     * @param Builder $builder
     * @param array $criteria
     * @return Builder
     */
    private function __addFilters(Builder $builder, array $criteria)
    {
        if (isset($criteria['categoryId'])) {
            $builder->where('category_id', '=', ':categoryId')
                ->setBindings(['categoryId' => $criteria['categoryId']]);
        }

        if (!empty($criteria['title'])) {
            $builder->where('title', 'like', ':title')
                ->setBindings(['title' => '"%'.$criteria['title'].'%"']);
        }

        if (!empty($criteria['content'])) {
            $builder->where('content', 'like', ':content')
                ->setBindings(['content' => '"%'.$criteria['content'].'%"']);
        }

        return $builder;
    }
}
