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
    public function getList(array $columns, array $criteria = null)
    {
        $list = $this->articleRepository->getList($criteria);

        return [
            'items' => $this->_prepareData($list),
            'data'  => []
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
