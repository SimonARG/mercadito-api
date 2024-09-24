<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\ApiController;

class TestController extends ApiController
{
    public function index(): JsonResponse
    {
        return $this->successResponse('meme', 'Traits fetched correctly');
    }
}