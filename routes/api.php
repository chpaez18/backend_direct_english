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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Usuarios
//-----------------------------------------------------------------------------------

Route::get('/usuarios/{id?}', 'App\Http\Controllers\UsuarioController@index');
Route::post('/usuarios/add', 'App\Http\Controllers\UsuarioController@store');
Route::put('/usuarios/update/{id}', 'App\Http\Controllers\UsuarioController@update');
Route::put('/usuarios/delete/{id}', 'App\Http\Controllers\UsuarioController@destroy');

//-----------------------------------------------------------------------------------


// Productos
//-----------------------------------------------------------------------------------

Route::get('/productos/{id?}', 'App\Http\Controllers\ProductoController@index');
Route::post('/productos/add', 'App\Http\Controllers\ProductoController@store');
Route::put('/productos/update/{id}', 'App\Http\Controllers\ProductoController@update');
Route::put('/productos/delete/{id}', 'App\Http\Controllers\ProductoController@destroy');

//-----------------------------------------------------------------------------------