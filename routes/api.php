<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Parqueadero Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Parqueadero routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Parqueadero" middleware group. Enjoy building your Parqueadero!
|
*/

Route::middleware('auth:Api')->get('/user', function (Request $request) {
    return $request->user();
});

//Obtener Todos los registros
//Route::get('parqueadero', 'App\Http\Controllers\ParqueaderoController@getAllParqueadero');
//Obtener Todos los registros
Route::get('parqueadero', 'App\Http\Controllers\ParqueaderoController@getListParqueadero');
//Buscar un registro
//Route::get('parqueadero/{id}', 'App\Http\Controllers\ParqueaderoController@getParqueadero');
//Crear un registro
Route::post('parqueadero', 'App\Http\Controllers\ParqueaderoController@createParqueadero');
//Actualizar un registro
Route::put('parqueadero/{id}', 'App\Http\Controllers\ParqueaderoController@updateParqueadero');
//Borrar un registro
Route::delete('parqueadero/{id}','App\Http\Controllers\ParqueaderoController@deleteParqueadero');
