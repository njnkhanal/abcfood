<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'welcome']);

Route::middleware(['auth'])->group(function () {
    // frontend controller
    Route::get('/cart/{product_id}', [FrontendController::class, 'cartAdd'])->name('cart.add');
    Route::post('/cart/{cart_index}', [FrontendController::class, 'cartUpdate'])->name('cart.update');
    Route::get('/cart', [FrontendController::class, 'viewCart'])->name('cart.view');
});
Route::get('/foodDetails/{id}', [FrontendController::class, 'foodDetails'])->name('foodDetail');

// for admin dashboard (prefix is used like (127.0.0.1:8000/admin/dashboard))
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // for user controller
    Route::resource('/user', UserController::class);
    Route::get('/getUserData', [UserController::class, 'getUserData'])->name('getUserData');

    //category controller
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('ajaxdata', [CategoryController::class, 'getdata'])->name('getdata');

    //category crud
    Route::get("/category-create", [CategoryController::class, 'create'])->name('addCategory');
    Route::post("/store", [CategoryController::class, 'store'])->name('storeCategory');
    Route::get("/category-delete/{id}", [CategoryController::class, 'destroy'])->name('admin.deleteCategory');

    //foodItem
    Route::resource('/food', FoodItemController::class);
    Route::get('/getFoodData', [FoodItemController::class, 'getFoodData'])->name('admin.getFoodData');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
