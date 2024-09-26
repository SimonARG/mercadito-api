<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;

interface ResourceInterface
{
    public function store(
            StoreUserRequest $request
        ): JsonResponse;

    public function show(Request $request, int $id): JsonResponse;

    public function update(Request $request, int $id): JsonResponse;

    public function destroy(Request $request, int $id): JsonResponse;
}