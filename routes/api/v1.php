<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

Route::apiResource('users', UserController::class);

// Route::apiResource('uploads', UploadController::class)->middleware('auth:sanctum');