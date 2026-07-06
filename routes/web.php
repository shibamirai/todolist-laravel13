<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoItemController;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy')->name('logout');
});

Route::controller(TodoItemController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});
