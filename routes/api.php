<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Registrar usuário
Route::resource('register', 'App\Http\Controllers\UserRegisterController')->only(['store']);

//CRUD de Despesas
Route::apiResource('despesas', 'App\Http\Controllers\DespesasController')->middleware('auth:api');

//CRUD de Usuários
Route::apiResource('users', 'App\Http\Controllers\UserController')->middleware('auth:api');

