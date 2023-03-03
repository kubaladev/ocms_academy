<?php

namespace SamuelKubala\TaskManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::middleware(ApiExceptionMiddleware::class)->group(function () {
    Route::resource('/teamgrid/tasks', TasksController::class);
    Route::get('teamgrid/tasks/getproject/{id}', [TasksController::class, 'getProject']);
    Route::get('teamgrid/tasks/getentries/{id}', [TasksController::class, 'getTimeEntries']);
});
