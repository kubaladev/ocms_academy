<?php

namespace SamuelKubala\Project;

use Illuminate\Support\Facades\Route;
use SamuelKubala\Project\Http\Controllers\ProjectsController;
use SamuelKubala\Project\Models\Project;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::middleware(ApiExceptionMiddleware::class)->group(function () {
    Route::resource('/teamgrid/projects', ProjectsController::class);
    Route::put('teamgrid/projects/close/{id}', [ProjectsController::class, 'closeproject']);
    Route::get('/teamgrid/projects/showtasks/{id}', [ProjectsController::class, 'showtasks']);
});
