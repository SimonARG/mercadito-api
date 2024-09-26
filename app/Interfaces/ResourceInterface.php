<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

interface ResourceInterface
{
    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function store(FormRequest $request): JsonResponse;

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request, int $id): JsonResponse;

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(FormRequest $request, int $id): JsonResponse;

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, int $id): JsonResponse;
}