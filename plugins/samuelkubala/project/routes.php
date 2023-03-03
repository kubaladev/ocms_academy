<?php

namespace SamuelKubala\Project;

use Illuminate\Support\Facades\Route;
use SamuelKubala\Project\Http\Controllers\ProjectsController;
use SamuelKubala\Project\Models\Project;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;
use LibUser\Userapi\Models\User;

Route::middleware(ApiExceptionMiddleware::class)->group(function () {
    Route::resource('/teamgrid/projects', ProjectsController::class)->middleware('auth');
    Route::put('teamgrid/projects/close/{id}', [ProjectsController::class, 'closeproject'])->middleware('auth');
    Route::get('/teamgrid/projects/showtasks/{id}', [ProjectsController::class, 'showtasks']);
});
