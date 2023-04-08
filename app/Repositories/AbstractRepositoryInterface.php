<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;

interface AbstractRepositoryInterface
{
    /**
     * @param Builder $builder
     * @param array $limitation
     * @return Builder
     */
    public function setQueryLimit(Builder $builder, array $limitation);
}
