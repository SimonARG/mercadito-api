<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;

interface AuthInterface
{
    public function register(Request $request): object;

    public function login(Request $request): JsonResponse;

    public function logout(Request $request): JsonResponse;
}