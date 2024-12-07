<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\AuthorizationContoller;
use \App\Http\Controllers\AdminPanelController;
use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\ImportController;
use \App\Http\Controllers\CartController;

Route::match(['post', 'get'], '/', [MainController::class, 'index'])->name('index');
Route::post("/login", [AuthorizationContoller::class, "signin"])->name("login");
Route::post("/logout", [AuthorizationContoller::class, "logout"])->name("logout");
Route::get("/createUser", [AdminPanelController::class, "createUser"])->name("createUser");
Route::post("/createUserRequest", [AdminPanelController::class, "createUserRequest"])->name("createUserRequest");
Route::get("/search", [SearchController::class, "search"])->name("search");
Route::post("/import", [ImportController::class, "importRequest"])->name("import");
Route::post("/buy", [CartController::class, "buy"])->name("buy");
Route::get("/cart", [CartController::class, "cart"])->name("cart");
Route::post("/deleteFromCart", [CartController::class, "delete"])->name("delete");

Route::any('/{any}', function () {
    return redirect('/');
})->where('any', '.*');
