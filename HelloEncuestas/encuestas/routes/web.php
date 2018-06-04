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

Route::post('eliminarEspecifica', 'EncuestaEspecificaController@eliminar')->name('eliminarEspecifica');
Route::post('guardarEspecifica', 'EncuestaEspecificaController@guardar')->name('guardarEspecifica');
Route::post('guardarContestada', 'EncuestaEspecificaContestadaController@guardar')->name('guardarContestada');
Route::resource('encuestaEspecifica', 'EncuestaEspecificaController');
Route::resource('encuestaEspecificaContestada', 'EncuestaEspecificaContestadaController');
Route::resource('campania', 'CampaniaController');
Route::resource('marca', 'MarcaController');
Route::resource('paquete', 'PaqueteController');
Route::resource('usuarios', 'UsuariosController');

Route::get('/', 'HomeController@index');

Route::get('/Producto', [
    'uses'=>'HomeController@productos',
    'as'=>'Home.producto'
]);

Route::get('/Paquetes', 'HomeController@paquetes');

Route::get('Usuarios/crear', [
    'uses' =>'UsuariosController@create',
    'as' => 'Usuarios.crear'

]);


Route::post('Usuarios/store', [
    'uses' =>'UsuariosController@store',
    'as' => 'Usuarios.store'

]);


Route::get('Usuarios/login', [
    'uses' =>'UsuariosController@login',
    'as' => 'Usuarios.login'

]);

Route::get('Usuarios/logout', [
    'uses' =>'UsuariosController@logout',
    'as' => 'Usuarios.logout'

]);

Route::get('Usuarios/mostrar', [
    'uses' =>'UsuariosController@show',
    'as' => 'Usuarios.mostrar'

]);

Auth::routes();

Route::post('Usuarios/login', [
    'uses' =>'UsuariosController@loginuser',
    'as' => 'Usuarios.login'

]);



Route::get('Usuarios/edit', [
    'uses' =>'UsuariosController@edit',
    'as' => 'Usuarios.edit'

]);


Route::put('Usuarios/update', [
    'uses' =>'UsuariosController@update',
    'as' => 'Usuarios.update'

]);


Route::get('Usuarios/Administrador_Correos', [
    'uses' =>'CorreoController@administrador',
    'as' => 'Usuarios.Administrador_Correos'

]);


Route::get('Usuarios/Lista_Correos', [
    'uses' =>'CorreoController@lista',
    'as' => 'Usuarios.lista_Correos'

]);



Route::post('Usuarios/Enviarcorreos','CorreoController@correos');

Route::post('Usuarios/Listacorreos','CorreoController@listasend');