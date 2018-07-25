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

Route::get('/', 'ProductController@index')->name('products');
Route::get('descargar-productos', 'ProductController@excel')->name('products.excel');

Route::get('/', 'ProductController@index')->name('products');
Route::get('descargar-productos', 'ProductController@pdf')->name('products.pdf');

Route::post('eliminarEspecifica', 'EncuestaEspecificaController@eliminar')->name('eliminarEspecifica');
Route::post('guardarEspecifica', 'EncuestaEspecificaController@guardar')->name('guardarEspecifica');
Route::post('actualizarEspecifica', 'EncuestaEspecificaContrloller@actualizar')->name('actualizarEspecifica');

Route::post('eliminarGlobal','EncuestaGlobalController@eliminar')->name('eliminarGlobal');
Route::post('guardarGlobal','EncuestaGlobalController@guardar')->name('guardarGlobal');
Route::post('actualizarGlobal','EncuestaGlobalController@actualizar')->name('actualizarGlobal');

Route::post('guardarContestada', 'EncuestaEspecificaContestadaController@guardar')->name('guardarContestada');
Route::post('guardarContestada', 'EncuestaGlobalContestadaController@guardar')->name('guardarContestada');

Route::post('agregarcorreo', 'CorreoController@agregarcorreo');


Route::post('agregarlista','CorreoController@agregarlista');
Route::post('editarlista','CorreoController@editarlista');

Route::resource('encuestaEspecifica', 'EncuestaEspecificaController');
Route::resource('encuestaEspecificaContestada', 'EncuestaEspecificaContestadaController');
Route::resource('encuestaGlobal', 'EncuestaGlobalController');
Route::resource('encuestaGlobalContestada', 'EncuestaGlobalContestadaController');
Route::resource('campania', 'CampaniaController');
Route::resource('marca', 'MarcaController');
Route::resource('paquete', 'PaqueteController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('mail', 'MailController');
Route::resource('correo','CorreoController');
Route::resource('Correos','CorreoController');

Route::get('agregarcorreo', 'CorreoController@agregarcorreo');
Route::get('agregarlista','CorreoController@agregarlista');
Route::get('editarlista','CorreoController@editarlista');
Route::get('/destroy/{id}','CorreoController@destroy');

Route::get('sendmail', function(){
    $data = array(
    'name'=>"Hellor Mexico",
);

Mail::send('emails.restore', $data, function($message){
    
        $message->from('developer.sr@hellomexico.mx','Helle Mexico Team');
        $message->to('helloteam.daniell@gmail.com')->subject('Mensaje de prueba helloteam');

    });
return "se envio el email nigga";

});


Route::get('/','EncuestaGlobalController@index');

Route::get('/restorepage', [
    'uses'=>'HomeController@restorepage',
    'as'=>'Home.restorepage'
]);


Route::get('/', 'HomeController@index');

Route::get('/tour', [
    'uses'=>'HomeController@tour',
    'as'=>'Home.tour'
]);


Route::get('/Producto', [
    'uses'=>'HomeController@productos',
    'as'=>'Home.producto'
]);

Route::get('/Paquetes', 
           ['uses'=>'HomeController@paquetes',
           'as'=>'Home.paquetes'
           ]);

Route::get('/create', [
    'uses' =>'EncuestaGlobalController@create',
    'as' =>'EncuestaGlobal.create'
]);
Route::get('Usuarios/crear', [
    'uses' =>'UsuariosController@create',
    'as' => 'Usuarios.crear'

]);
//mailrecuperar
Route::post('Usuarios/restoremail', [
    'uses' =>'UsuariosController@restoremail',
    'as' => 'Usuarios.restoremail'

]);
//end mail

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

Route::post('Usuarios/obtener', [
    'uses' =>'UsuariosController@obtener',
    'as' => 'Usuarios.obtener'

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

Route::get('Usuarios/recuperar', [
    'uses'=>'UsuariosController@recuperar',
    'as'=>'Usuarios.recuperar'
]);

Route::get('Correos/enviarcorreos',[
    'uses'=>'CorreoController@correos',
    'as'=>'Correos.enviarcorreos']);