<?php

namespace SamuelKubala\Project;

use Illuminate\Support\Facades\Route;
use SamuelKubala\Project\Http\Controllers\ProjectsController;
use SamuelKubala\Project\Models\Project;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::resource('/teamgrid/projects', ProjectsController::class)->middleware(ApiExceptionMiddleware::class);
Route::put('teamgrid/projects/close/{id}', [ProjectsController::class, 'closeproject'])->middleware(ApiExceptionMiddleware::class);
//Route::post('teamgrid/projects', [ProjectsController::class, 'store']);
//Ani toto mi nefunguje, nevie najst tu triedu
//Route::get('/teamgrid/projects', 'ProjectsController@index');
