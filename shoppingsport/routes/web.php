<?php


use App\Http\Controllers\Admin\PartnersController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CustomerReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;

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

        Route::prefix('category')->name('category.')->group(function (){
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::post('/fetch/{type}', [CategoryController::class, 'fetch'])->name('fetch');
            Route::get('/add', [CategoryController::class, 'add'])->name('add');
            Route::post('/add', [CategoryController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');

            Route::get('/add_brand', [CategoryController::class, 'addbrand'])->name('add.brand');
            Route::post('/add_brand', [CategoryController::class, 'storebrand'])->name('store.brand');
            Route::get('/get-brands-category_child/{categoryId}', [CategoryController::class, 'getBrands'])->name('brand.category.child');
            Route::get('/brand-by-category/{id}', [CategoryController::class, 'brandbycategory'])->name('brand.by.category');
            Route::post('/delete/brand-by-category/{id}', [CategoryController::class, 'deletebrandbycategory'])->name('delete.brand.by.category');
        });

        Route::prefix('brand')->name('brand.')->group(function (){
            Route::get('/', [BrandController::class, 'index'])->name('index');
            Route::post('/fetch', [BrandController::class, 'fetch'])->name('fetch');
            Route::get('/add', [BrandController::class, 'add'])->name('add');
            Route::post('/store', [BrandController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BrandController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [BrandController::class, 'delete'])->name('delete');
        });

        Route::prefix('product')->name('product.')->group(function (){
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::post('/fetch', [ProductController::class, 'fetch'])->name('fetch');
            Route::get('/add', [ProductController::class, 'add'])->name('add');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [ProductController::class, 'update'])->name('edit');
            Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        });

        Route::prefix('images')->name('images.')->group(function (){
            Route::get('/product', [ProductController::class, 'images'])->name('index');
            Route::post('/product/fetch', [ProductController::class, 'imagesfetch'])->name('fetch');
        });

        Route::prefix('order')->name('order.')->group(function (){
            Route::get('', [OrderController::class, 'index'])->name('index');
            Route::post('fetch', [OrderController::class, 'fetch'])->name('fetch');
            Route::get('view/{id}', [OrderController::class, 'view'])->name('view');
            Route::get('edit/{id}', [OrderController::class, 'edit'])->name('edit');
            Route::post('active/{id}', [OrderController::class, 'active'])->name('active');
            Route::post('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        });

        Route::prefix('partner')->name('partner.')->group(function () {
            Route::get('', [PartnersController::class, 'index'])->name('index');
            Route::get('add', [PartnersController::class, 'add'])->name('add');
            Route::post('add', [PartnersController::class, 'addsubmit'])->name('addsubmit');
            Route::get('/{id}', [PartnersController::class, 'edit'])->name('edit');
            Route::post('/{id}', [PartnersController::class, 'editsubmit'])->name('editsubmit');
            Route::post('delete/{id}', [PartnersController::class, 'delete'])->name('delete');
        });

        Route::prefix('reviews')->name('reviews.')->group(function () {
            Route::get('/', [CustomerReviewController::class, 'index'])->name('index');
            Route::get('add/', [CustomerReviewController::class, 'add'])->name('add');
            Route::post('add/', [CustomerReviewController::class, 'store'])->name('store');
            Route::get('/{id}', [CustomerReviewController::class, 'show'])->name('show');
            Route::post('/{id}', [CustomerReviewController::class, 'update'])->name('update');
            Route::post('delete/{id}', [CustomerReviewController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('config')->name('config.')->group(function () {
            Route::get('/', [ConfigController::class, 'index'])->name('index');
            Route::post('/', [ConfigController::class, 'update'])->name('update');

        });

        Route::prefix('news')->name('new.')->group(function () {
            Route::get('', [NewsController::class, 'index'])->name('index');
            Route::post('fetch', [NewsController::class, 'fetch'])->name('fetch');
            Route::get('add', [NewsController::class, 'create'])->name('add');
            Route::post('store', [NewsController::class, 'store'])->name('store');
            Route::get('{id}', [NewsController::class, 'show'])->name('show');
            Route::post('{id}', [NewsController::class, 'update'])->name('update');
            Route::post('delete/{id}', [NewsController::class, 'destroy'])->name('delete');
        });
    });



});
