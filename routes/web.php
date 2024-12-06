<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\AuthorizationContoller;
use \App\Http\Controllers\AdminPanelController;

Route::match(['post', 'get'], '/', [MainController::class, 'index'])->name('index');
Route::post("/login", [AuthorizationContoller::class, "signin"])->name("login");
Route::post("/logout", [AuthorizationContoller::class, "logout"])->name("logout");
Route::get("/createUser", [AdminPanelController::class, "createUser"])->name("createUser");
Route::post("/createUserRequest", [AdminPanelController::class, "createUserRequest"])->name("createUserRequest");
