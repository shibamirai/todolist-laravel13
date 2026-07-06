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
    Route::get('todoitems/{todoItem}/edit', 'edit')->name('edit');
    Route::post('todoitems/{todoItem}', 'update')->name('update');
    Route::get('todoitems/{todoItem}/delete', 'delete')->name('delete');
    Route::post('todoitems/{todoItem}/delete', 'destroy')->name('destroy');
});
