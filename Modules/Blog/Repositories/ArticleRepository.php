<?php

namespace Modules\Blog\Repositories;

use App\Repositories\AbstractRepository;
use App\Utils\CfgAppConfig;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Article;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
    /**
     * @see ArticleRepositoryInterface::getList()
     */
    public function getList(array $criteria = null, array $limitation = null)
    {
        $qb = Article::query()
            ->join('article_categories as ac', 'articles.category_id', '=', 'ac.id')
            ->select(['articles.id', 'category_id', 'ac.title as category_name', 'articles.title', 'content'])
        ;

        if (!empty($criteria)) {
            $qb = $this->__addFilters($qb, $criteria);
        }

        if (!empty($limitation['limit']) && $limitation['limit'] > 0) {
            $qb = $this->setQueryLimit($qb, $limitation);
        } else {
            $qb = $qb->limit(CfgAppConfig::DEFAULT_LIMIT);
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
        $bindings = [];

        if (isset($criteria['categoryId'])) {
            $builder->where('category_id', '=', ':categoryId');
            $bindings['categoryId'] = $criteria['categoryId'];
        }

        if (!empty($criteria['title'])) {
            $builder->where('articles.title', 'like', ':title');
            $bindings['title']      = '%'.$criteria['title'].'%';
        }

        if (!empty($criteria['content'])) {
            $builder->where('content', 'like', ':content');
            $bindings['content']    = '%'.$criteria['content'].'%';
        }

        $builder->setBindings($bindings);

        return $builder;
    }

    /**
     * @see ArticleRepositoryInterface::getTotalList()
     */
    public function getTotalList(array $criteria = null)
    {
        $qb = Article::query()
            ->join('article_categories as ac', 'articles.category_id', '=', 'ac.id')
        ;

        if (!empty($criteria)) {
            $qb = $this->__addFilters($qb, $criteria);
        }

        return $qb->first(DB::raw('count(articles.id) as count'))['count'];
    }
}
