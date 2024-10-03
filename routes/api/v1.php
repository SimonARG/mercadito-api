<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\SubscriptionController;

Route::post('users', [UserController::class, 'store']);

Route::apiResource('users', UserController::class)
    ->except(['store'])
    ->middleware('auth:sanctum');

Route::apiResource('subscriptions', SubscriptionController::class);

// Route::apiResource('uploads', UploadController::class)->middleware('auth:sanctum');