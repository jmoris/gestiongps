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
    return view('login');
});
Route::get('/home', function() {
    return view('home');
})->middleware('connected');

Route::get('/servidor', 'ServidorController@obtener')
->middleware('connected');

Route::post('/servidor', 'ServidorController@guardar')
->middleware('connected');

Route::post('/login', 'AuthController@conectar');

Route::get('/login', function(){ return view('login'); });

Route::post('/logout', 'AuthController@desconectar');

Route::get('/usuarios', 'UsuarioController@mostrar');

Route::get('/dispositivos' , 'DispositivosController@mostrar');

Route::get('/dispositivos/agregar', function(){
    return view('dispositivos.agregar');
});

Route::post('/dispositivos', 'DispositivosController@agregar');
Route::post('/logout', 'AuthController@desconectar');   


Route::post('/logout', 'AuthController@desconectar');

Route::get('/usuarios', 'UsuarioController@mostrar');

Route::get('/choferes', 'ChoferesController@mostrar');

Route::get('/choferes/agregar', function(){
    return view('choferes.agregar');
});

Route::post('/choferes', 'ChoferesController@agregar');

Route::get('/choferes/modificar/{id}', 'ChoferesController@vistaModificar');
Route::post('/choferes/modificar/{id}', 'ChoferesController@modificar');

Route::get('/choferes/eliminar/{id}', 'ChoferesController@eliminar');
Route::get('/choferes/asignarDispositivo/{id}', 'ChoferesController@asignarDispositivo');
