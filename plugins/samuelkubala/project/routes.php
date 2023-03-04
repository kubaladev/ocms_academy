<?php

namespace SamuelKubala\Project;

use Illuminate\Support\Facades\Route;
use SamuelKubala\Project\Http\Controllers\ProjectsController;
use SamuelKubala\Project\Http\Controllers\ProjectsUserController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;
use SamuelKubala\Project\Http\Middleware\ProjectAuthMiddleware;


Route::group(
    [
        "prefix" => "/api/teamgrid/projects",
        'middleware' => [ApiExceptionMiddleware::class, 'auth']
    ],
    function () {
        //Routes any logged user can use
        Route::get('/', [ProjectsController::class, 'index']);
        Route::post('/', [ProjectsController::class, 'store']);

        //Middleware ensures that a user has access to the project
        Route::group(['middleware' => ProjectAuthMiddleware::class], function () {
            Route::put('/{id}', [ProjectsController::class, 'update']);
            Route::delete('/{id}', [ProjectsController::class, 'destroy']);
            Route::put('/close/{id}', [ProjectsController::class, 'closeProject']);
            Route::get('/{id}', [ProjectsController::class, 'show']);

            //Tasks
            Route::get('/alltasks/{id}', [ProjectsController::class, 'showAllTasks']);
            Route::get('/mytasks/{id}', [ProjectsController::class, 'showMyTasks']);

            //Add or Remove users to project
            Route::post('/adduser/{id}/{user_id}', [ProjectsUserController::class, 'addUserToProject']);
            Route::delete('/removeuser/{id}/{user_id}', [ProjectsUserController::class, 'removeUserFromProject']);
        });
    }
);
