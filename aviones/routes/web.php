<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Route::resource('avions', 'avionsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('clientes', 'clientesController');

Route::resource('empresas', 'empresasController');

Route::resource('tipoReservas', 'tipoReservaController');

Route::resource('tarifas', 'tarifasController');

Route::resource('aviones', 'avionesController');

Route::resource('vuelos', 'vuelosController');

Route::resource('reservas', 'reservasController');