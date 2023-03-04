<?php

namespace SamuelKubala\TaskManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group(["prefix" => "/api/teamgrid/tasks"], function () {
    Route::middleware(ApiExceptionMiddleware::class, 'auth')->group(function () {
        Route::resource('/', TasksController::class);
        Route::get('/getproject/{id}', [TasksController::class, 'getProject']);
        Route::get('/getentries/{id}', [TasksController::class, 'getTimeEntries']);
    });
});
