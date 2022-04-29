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

Route::post('/login', 'App\Http\Controllers\NoticiasController@inicioSesion')->name('login');

Route::get('/formulario', 'App\Http\Controllers\NoticiasController@formulario')->name('formulario');

Route::get('/noticias', 'App\Http\Controllers\NoticiasController@noticias')->name('noticias');

Route::get('/edicion', 'App\Http\Controllers\NoticiasController@edicion')->name('edicion');

Route::post('/insertarNoticia', 'App\Http\Controllers\NoticiasController@insertarNoticia')->name('insertarNoticia');

Route::post('/actualizarNoticia', 'App\Http\Controllers\NoticiasController@actualizarNoticia')->name('actualizarNoticia');

Route::get('/cerrarSesion', 'App\Http\Controllers\NoticiasController@cerrarSesion')->name('cerrarSesion');
