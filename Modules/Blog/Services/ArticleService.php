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
        return [
            'items' => $this->articleRepository->getList($columns, $criteria),
            'data'  => []
        ];
    }
}
