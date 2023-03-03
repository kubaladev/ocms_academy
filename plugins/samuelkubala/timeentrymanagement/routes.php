<?php

namespace SamuelKubala\TimeEntryManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TimeEntryManagement\Http\Controllers\TimeEntriesController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::middleware(ApiExceptionMiddleware::class)->group(function () {
    Route::resource('/teamgrid/entries', TimeEntriesController::class);
    Route::post('/teamgrid/entries/starttrack/{task_id}', [TimeEntriesController::class, 'startTracking']);
    Route::post('/teamgrid/entries/stoptrack/{task_id}', [TimeEntriesController::class, 'stopTracking']);
});
