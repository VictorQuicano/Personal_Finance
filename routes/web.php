<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('plans', App\Http\Controllers\PlanController::class);

Route::resource('accounts', App\Http\Controllers\AccountController::class);

Route::resource('categories', App\Http\Controllers\CategoriesController::class);

Route::resource('transactions', App\Http\Controllers\TransactionController::class);

Route::resource('account-types', App\Http\Controllers\AccountTypeController::class);


Route::resource('plans', App\Http\Controllers\PlanController::class);

Route::resource('accounts', App\Http\Controllers\AccountController::class);

Route::resource('categories', App\Http\Controllers\CategoriesController::class);

Route::resource('transactions', App\Http\Controllers\TransactionController::class);

Route::resource('account-types', App\Http\Controllers\AccountTypeController::class);
