<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');

Route::resource('users', UserController::class);
