<?php

namespace SamuelKubala\TaskManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use SamuelKubala\TaskManagement\Http\Middleware\TaskAuthMiddleware;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group(
    [
        "prefix" => "/api/teamgrid/tasks",
        'middleware' => [ApiExceptionMiddleware::class, 'auth']
    ],
    function () {
        Route::get('/', [TasksController::class, 'index']);
        Route::post('/', [TasksController::class, 'store']);

        //Middleware ensures that a user has access to the task
        Route::group(['middleware' => TaskAuthMiddleware::class], function () {
            Route::put('/{id}', [TasksController::class, 'update']);
            Route::delete('/{id}', [TasksController::class, 'destroy']);
            Route::get('/{id}', [TasksController::class, 'show']);
            Route::get('/getproject/{id}', [TasksController::class, 'getProject']);
            Route::get('/getentries/{id}', [TasksController::class, 'getTimeEntries']);
        });
    }
);
