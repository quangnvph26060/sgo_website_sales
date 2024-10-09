<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





    Route::get('cart', function () {
        return view('client.pages.cart-page');
    })->name('cart-page');

    Route::get('details', function () {
        return view('client.pages.detail');
    })->name('details');

    Route::get('danh-sach', function () {
        return view('client.pages.list');
    })->name('list');

    Route::get('login', function () {
        return view('client.pages.auth.login');
    })->name('login');

    Route::get('register', function () {
        return view('client.pages.auth.register');
    })->name('register');


