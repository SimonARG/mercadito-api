<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    public function __construct(private AuthController $authController)
    { }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->authController->register($request);

        return $this->successResponse($user, "User $request->name registered succesfully");
    }
}