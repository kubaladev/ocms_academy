<?php

use LibUser\Userapi\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {

    Route::group(["prefix" => "auth"], function () {
        Route::post("register", [UserController::class, "register"]);
        Route::post("login", [UserController::class, "login"]);
    });
});
