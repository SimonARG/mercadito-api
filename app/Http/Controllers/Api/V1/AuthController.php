<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\StoreUserRequest;
use App\Interfaces\AuthInterface;

class AuthController extends ApiController implements AuthInterface
{
    public function __construct(protected AuthService $service)
    { }

    public function register(StoreUserRequest $request): object
    {
        $user = $this->service->createUser($request);

        $user->apiToken = $this->service->createToken($user);

        return $user;
    }

    public function login(Request $request): JsonResponse
    {
        return $this->successResponse('meme', 'Traits fetched correctly');
    }

    public function logout(Request $request): JsonResponse
    {
        return $this->successResponse('meme', 'Traits fetched correctly');
    }
}