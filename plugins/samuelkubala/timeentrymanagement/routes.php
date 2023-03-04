<?php

namespace SamuelKubala\TimeEntryManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TimeEntryManagement\Http\Controllers\TimeEntriesController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::middleware(ApiExceptionMiddleware::class)->group(function () {
});

Route::group(["prefix" => "/api/teamgrid/entries"], function () {
    Route::middleware(ApiExceptionMiddleware::class, 'auth')->group(function () {
        Route::resource('/', TimeEntriesController::class);
        Route::post('/starttrack/{task_id}', [TimeEntriesController::class, 'startTracking']);
        Route::post('/stoptrack/{task_id}', [TimeEntriesController::class, 'stopTracking']);
    });
});
