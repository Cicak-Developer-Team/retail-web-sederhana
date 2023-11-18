<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("login");
});

// public page
Route::controller(Login::class)->middleware("guest")->group(function() {
    Route::get("/login", "index")->name("login");
    Route::post("/login", "auth")->name("auth");
});

// dashboard page
Route::prefix("dashboard")->middleware("auth")->group(function() {
    Route::controller(Dashboard::class)->group(function(){
        Route::get("/", "index")->name("dashboard");
    });
});