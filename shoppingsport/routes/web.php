<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::get('admin/dang-nhap', function () {
    return view('admin.login.index');
})->name('form_login');

Route::post('', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [AuthController::class, 'register'])->name('register');


// Route::get('/products', [CategoryController::class, 'index'])->name('products.index');
// Route::post('/products/fetch', [CategoryController::class, 'fetch'])->name('products.fetch');

Route::middleware(['checkLogin', 'checkRole:1,2'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

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
});


Route::name('user.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home-page');

    Route::get('details', function () {
        return view('client.pages.detail');
    })->name('details');

    Route::get('login', function () {
        return view('client.pages.auth.login');
    })->name('login');

    Route::get('register', function () {
        return view('client.pages.auth.register');
    })->name('register');
});
