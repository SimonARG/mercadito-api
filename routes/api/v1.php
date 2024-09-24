<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TestController;

// Route::apiResource('/', StellarisController::class);

Route::get('/', [TestController::class, "index"]);

// Route::apiResource('uploads', UploadController::class)->middleware('auth:sanctum');