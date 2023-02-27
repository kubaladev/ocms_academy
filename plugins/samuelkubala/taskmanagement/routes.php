<?php

namespace SamuelKubala\TaskManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::resource('/teamgrid/tasks', TasksController::class)->middleware(ApiExceptionMiddleware::class);
