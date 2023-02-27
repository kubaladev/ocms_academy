<?php

namespace SamuelKubala\TimeEntryManagement;

use Illuminate\Support\Facades\Route;
use SamuelKubala\TimeEntryManagement\Http\Controllers\TimeEntriesController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::resource('/teamgrid/entries', TimeEntriesController::class)->middleware(ApiExceptionMiddleware::class);
