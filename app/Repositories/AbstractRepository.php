<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class AbstractRepository implements AbstractRepositoryInterface
{
    /**
     * @see AbstractRepositoryInterface::setQueryLimit()
     */
    public function setQueryLimit(Builder $builder, array $limitation)
    {
        if (isset($limitation['last']) && $limitation['last'] > 0) {
            $builder = $builder->skip($limitation['last'] + 1);
        }

        if (isset($limitation['limit']) && $limitation['limit'] > 0) {
            $builder = $builder->limit($limitation['limit']);
        }

        return $builder;
    }
}
