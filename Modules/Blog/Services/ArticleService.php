<?php

namespace Modules\Blog\Services;

use Modules\Blog\Entities\Article;
use Modules\Blog\Repositories\ArticleRepository;
use Modules\Blog\Repositories\ArticleRepositoryInterface;

class ArticleService implements ArticleServiceInterface
{
    protected ArticleRepository $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @see ArticleServiceInterface::getList()
     */
    public function getList(array $filters = null)
    {
        $criteria   = $filters['filters'];
        $limitation = $filters['limitation'];
        $list = $this->articleRepository->getList($criteria, $limitation);

        return [
            'items' => $this->_prepareData($list),
            'data'  => [
                'count' => intval($this->articleRepository->getTotalList($criteria))
            ]
        ];
    }

    private function _prepareData(array $data)
    {
        $result = [];
        foreach ($data as $datum) {
            $result[] = [
                'title'     => $datum['title'],
                'category'  => [
                    'id'        => $datum['category_id'],
                    'name'      => $datum['category_name']
                ],
                'content'   => $datum['content']
            ];
        }

        return $result;
    }
}
