<?php

namespace App\Http\Requests;

trait PrepareRequest
{
    protected $nonCriteriaKeys = ['limit', 'last'];

    protected function passedValidation()
    {
        $filters = $limit = [];

        foreach ($this->query() as $key => $req) {
            if (!in_array($key, $this->nonCriteriaKeys)) {
                $filters[$key]  = $req;
            } else{
                $limit[$key]    = $req;
            }
            $this->query->remove($key);
        }

        $this->query->replace([
            'filters'       => $filters,
            'limitation'    => $limit
        ]);
    }
}
