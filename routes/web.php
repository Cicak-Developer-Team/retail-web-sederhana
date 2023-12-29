<?php

use App\Http\Controllers\Category;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\History;
use App\Http\Controllers\Login;
use App\Http\Controllers\Product;
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
Route::controller(Login::class)->group(function () {
    Route::middleware("guest")->group(function () {
        Route::get("/login", "index")->name("login");
        Route::post("/login", "auth")->name("auth");
    });
    Route::get("/logout", "logout")->name("logout");
});

// dashboard page
Route::prefix("dashboard")->middleware("auth")->group(function () {

    // dashboard
    Route::controller(Dashboard::class)->group(function () {
        Route::get("/", "index")->name("dashboard");
    });

    // product
    Route::prefix("/product")->group(function () {
        Route::controller(Product::class)->group(function () {
            Route::get("/", "index");
            Route::get("/remove/{id}", "remove")->name("remove_product");
            Route::post("/add", "add")->name("add_product");
            Route::post("/update", "update")->name("update_product");
        });
    });

    // category
    Route::prefix("category")->group(function () {
        Route::controller(Category::class)->group(function () {
            Route::get("/", "index")->name("category_home");
            Route::get("/remove/{id}", "remove")->name("remove_category");

            Route::post("/", "add")->name("add_category");
            Route::post("/update", "update")->name("update_category");
        });
    });

    // History
    Route::prefix("history")->group(function () {
        Route::controller(History::class)->group(function () {
            Route::get("/", "index")->name("history_home");
        });
    });
});
