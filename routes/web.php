<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "storelogin"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get("/signup", [AuthController::class, "signup"])->name("signup");
Route::post("/signup", [AuthController::class, "storesignup"])->name("store-signup");

Route::middleware('auth')->group(function () {
    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
}); 