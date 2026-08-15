<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('todos');
});

Route::get("login", [LoginController::class, "create"])->name("login");
Route::post("login", [LoginController::class, "store"]);

Route::get("register", [RegisterController::class, "create"])->name("register");
Route::post("register", [RegisterController::class, "store"]);


Route::middleware(['auth'])->group(function() {
    Route::resource('todos', TodoController::class);
    Route::post("logout", [LoginController::class, "destroy"])->name("logout");
});