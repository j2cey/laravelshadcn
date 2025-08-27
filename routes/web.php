<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "storelogin"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get("/signup", [AuthController::class, "signup"])->name("signup");
Route::post("/signup", [AuthController::class, "storesignup"])->name("store-signup");

Route::middleware('auth')->group(function () {
    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
    Route::prefix("products")->name("products")->group(function () {
        Route::get("/", [ProductController::class, "index"]);
    });
    Route::prefix("revenues")->name("revenues")->group(function () {
        Route::get("/", [RevenueController::class, "index"]);
    });
}); 