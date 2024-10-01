<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Interfaces\ResourceInterface;
use App\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController implements ResourceInterface
{
    public function __construct(
        private AuthController $authController,
        public UserService $service
        )
    {

    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->authController->register($request);

        $user->assignRole('free');

        return $this->createdResponse($user, "User {$request->name} registered successfully");
    }

    public function show(Request $request, int $id): JsonResponse
    {
        return $this->successResponse('meme', 'meme');
    }

    public function update(Request $request, int $id): JsonResponse
    {
        return $this->successResponse('meme', 'meme');
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        return $this->successResponse('meme', 'meme');
    }
}