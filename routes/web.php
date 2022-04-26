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
    return view('welcome');
})->name('inicio');

Route::post('/login', 'App\Http\Controllers\NoticiasController@inicioSesion');

Route::get('/formulario', 'App\Http\Controllers\NoticiasController@formulario')->name('formulario');

Route::post('/insertarNoticia', 'App\Http\Controllers\NoticiasController@insertarNoticia');

Route::get('/cerrarSesion', 'App\Http\Controllers\NoticiasController@cerrarSesion');
