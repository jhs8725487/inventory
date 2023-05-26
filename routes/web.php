<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

// routes/web.php or routes/api.php
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');
// routes/web.php or routes/api.php

Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');



Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');



Route::get('/product', [ProductController::class, 'index'])->name('product.index');


Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/register', function () {
    return view('users/register-user');
})->name('register-user');

Route::get('/sidebar', function () {
    return view('users/fixed-sidebar');
})->name('fixed-sidebar');

Route::get('/registerCategory', function () {
    return view('users/register-category');
})->name('register-category');


Route::get('/registerProduct', [ProductController::class, 'create'])->name('register-product');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');


//Route::post('/users', 'UserController@store')->name('users.store');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');



Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.softrestore');
Route::put('/users/{id}/delete', [UserController::class, 'delete'])->name('users.softdelete');