<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

trait PrepareResponseTrait
{
    /**
     * @return Response
     */
    protected function EmptyResponse()
    {
        return response(null, 204);
    }

    /**
     * @param array $data
     * @param int $statusId
     * @return Response
     */
    protected function JsonResponse(array $data, int $statusId)
    {
        return response($data, $statusId);
    }
}
