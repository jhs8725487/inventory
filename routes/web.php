<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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




Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/register', function () {
    return view('users/register-user');
})->name('register-user');

//Route::post('/users', 'UserController@store')->name('users.store');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.softrestore');
Route::put('/users/{id}/delete', [UserController::class, 'delete'])->name('users.softdelete');