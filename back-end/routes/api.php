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
//Rota que gera o token de autenticação da API
Route::post('auth/token', 'App\Http\Controllers\DefaultController@authenticate');

//CRUD de Despesas
Route::apiResource('despesas', 'App\Http\Controllers\DespesasController')->middleware('auth:api');

//CRUD de Usuários
Route::apiResource('users', 'App\Http\Controllers\UserController');

