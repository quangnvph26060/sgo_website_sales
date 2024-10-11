<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\WishlistController;
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



Route::name('user.')->group(function () {
    Route::get('/', [HomePageController::class, 'home'])->name('home-page');

    Route::get('cart', function () {
        return view('client.pages.cart-page');
    })->name('cart-page');

    Route::get('details', function () {
        return view('client.pages.detail');
    })->name('details');

    Route::get('danh-sach', function () {
        return view('client.pages.list');
    })->name('list');

    Route::controller(CartController::class)->group(function () {

        Route::post('cart', 'cartList')->name('cart');
        Route::post('add-to-cart', 'addToCart')->name('add-to-cart');

        Route::post('edit-cart', 'updateCart')->name('update-cart');
    });

    Route::controller(WishlistController::class)->group(function () {

        Route::get('wishlist-product', 'index')->name('wishlist');
        Route::post('ajax/wishlist', 'addWishlist')->name('add-to-wishlist');
    });


    Route::controller(AuthController::class)->group(function () {

        Route::middleware('guest')->group(function () {
            Route::get('login1', 'login')->name('login');

            Route::post('login1', 'authenticate');

            Route::get('register', 'register')->name('register');

            Route::post('register', 'store');

            Route::get('activate/{token}', 'activate')->name('activate');

            Route::post('forgot-password', 'forgotPassword')->name('forgot-password');

            Route::get('change-password/{token}', 'formChangePassword')->name('change-password');

            Route::post('change-password/{token}', 'changePassword')->name('change-password-submit');
        });

        Route::get('logout', 'logout')->name('logout');
    });
});

