<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;

interface AuthInterface
{
    public function register(StoreUserRequest $request): object;

    public function login(Request $request): JsonResponse;

    public function logout(Request $request): JsonResponse;
}