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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('avions', 'avionsAPIController');

Route::resource('clientes', 'clientesAPIController');

Route::resource('empresas', 'empresasAPIController');

Route::resource('tipo_reservas', 'tipoReservaAPIController');

Route::resource('tarifas', 'tarifasAPIController');

Route::resource('aviones', 'avionesAPIController');

Route::resource('vuelos', 'vuelosAPIController');

Route::resource('reservas', 'reservasAPIController');