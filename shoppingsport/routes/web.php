<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('admin.guest')->group(function () {
        // Trang đăng nhập cho admin không cần yêu cầu đã đăng nhập
        Route::get('login', function () {
            return view('admin.login.index');
        })->name('login');

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::middleware('admin.auth')->group(function () {
        // Các route yêu cầu đã đăng nhập mới truy cập được
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
