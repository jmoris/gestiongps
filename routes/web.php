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

Route::get('/', function () {
    return view('login');
});
Route::get('/home', function() {
    return view('home');
})->middleware('connected');

Route::post('/login', 'AuthController@conectar');

Route::get('/login', function(){ return view('login'); });

Route::post('/logout', 'AuthController@desconectar');

Route::get('/usuarios', 'UsuarioController@mostrar');

Route::get('/usuarios/agregar-usuario', 'UsuarioController@addUsuarioView');

Route::post('/usuarios/agregar-usuario', 'UsuarioController@agregar');

Route::get('/usuarios/editar-usuario/{id}', 'UsuarioController@vistaEditarUsuario');

Route::get('/usuarios/ver-usuario/{id}', 'UsuarioController@verUsuario');

Route::post('/usuarios/editar-usuario/{id}', 'UsuarioController@modificar');

Route::post('/usuarios/eliminar-usuario/{id}', 'UsuarioController@eliminar');
