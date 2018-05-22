<?php

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

Route::get('/', 'EncuestaEspecificaController@index');
Route::post('eliminarEspecifica', 'EncuestaEspecificaController@eliminar')->name('eliminarEspecifica');
Route::post('guardarEspecifica', 'EncuestaEspecificaController@guardar')->name('guardarEspecifica');
Route::post('guardarContestada', 'EncuestaEspecificaContestadaController@guardar')->name('guardarContestada');
Route::resource('encuestaEspecifica', 'EncuestaEspecificaController');
Route::resource('encuestaEspecificaContestada', 'EncuestaEspecificaContestadaController');

