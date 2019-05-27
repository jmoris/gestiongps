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
    return redirect('/login');
});
Route::post('/login', 'AuthController@conectar');
Route::get('/login', function(){
    if(\App\Implementation\UserStore::getInstance()->isConnected()){
        return redirect('/home');
    }else{
        return view('login');
    }
});

Route::middleware(['connected'])->group(function () {
    /* RUTAS VARIAS */
    Route::get('/home', function() { return view('home'); });
    Route::post('/logout', 'AuthController@desconectar');
    /* RUTAS SERVIDOR */
    Route::get('/servidor', 'ServidorController@obtener');
    Route::post('/servidor', 'ServidorController@guardar');
    /* RUTAS USUARIOS */
    Route::get('/usuarios', 'UsuarioController@mostrar');
    Route::post('/usuarios/{id}/admin', 'UsuarioController@editarPrivilegioDeAdmin');
    Route::post('/usuarios/{id}/usuario', 'UsuarioController@editarPrivilegioDeUsuario');
    Route::get('/usuarios/agregar-usuario', 'UsuarioController@addUsuarioView');
    Route::post('/usuarios/agregar-usuario', 'UsuarioController@agregar');
    Route::get('/usuarios/editar-usuario/{id}', 'UsuarioController@vistaEditarUsuario');
    Route::get('/usuarios/ver-usuario/{id}', 'UsuarioController@verUsuario');
    Route::post('/usuarios/editar-usuario/{id}', 'UsuarioController@modificar');
    Route::post('/usuarios/eliminar-usuario/{id}', 'UsuarioController@eliminar');
    Route::get('/usuarios/{id}/asignar', 'UsuarioController@vistaAsignarDispositivo');
    Route::post('/usuarios/{id}/asignar', 'UsuarioController@asignarDispositivo');
    /* RUTAS DISPOSITIVOS */
    Route::get('/dispositivos' , 'DispositivosController@mostrar');
    Route::get('/dispositivos/agregar', 'DispositivosController@vistaAgregar');
    Route::post('/dispositivos', 'DispositivosController@agregar');
    Route::get('/dispositivos/editar/{id}', 'DispositivosController@vistaEditarDispositivo');
    Route::post('dispositivos/{id}','DispositivosController@modificar');
    Route::get('dispositivos/ver/{id}', 'DispositivosController@verDispositivo');
    Route::post('dispositivos/eliminar/{id}', 'DispositivosController@eliminar');
    /* RUTAS CHOFERES */
    Route::get('/choferes', 'ChoferesController@mostrar');
    Route::get('/choferes/agregar', 'ChoferesController@vistaAgregar');
    Route::post('/choferes', 'ChoferesController@agregar');
    Route::post('/choferes/grupo', 'ChoferesController@agregarGrupo');
    Route::get('/choferes/modificar/{id}', 'ChoferesController@vistaModificar');
    Route::post('/choferes/modificar/{id}', 'ChoferesController@modificar');
    Route::get('/choferes/eliminar/{id}', 'ChoferesController@eliminar');
    Route::get('/choferes/asignarGrupo/{id}', 'ChoferesController@vistaAsignarGrupo');
    Route::post('/choferes/asignarGrupo/{id}', 'ChoferesController@asignarGrupo');
    /* RUTAS REPORTES */
    Route::get('/reportes', 'ReporteController@mostrar');
    Route::get('/reportes/usuarios', 'ReporteController@reporteUsuarios');
    Route::get('/reportes/dispositivos', 'ReporteController@reporteDispositivos');
    Route::get('/reportes/usuarios/seleccionar', 'ReporteController@reporteUsuariosSeleccion');
    Route::get('/reportes/usuarios/{id}', 'ReporteController@reporteUsuariosPorId');

    /* RUTAS GEOCERCAS */
    Route::get('/geocercas', 'GeocercaController@obtener');
    Route::get('/geocercas/agregar-geocerca', 'GeocercaController@vistaAgregarGeocerca');
    Route::post('/geocercas/agregar-geocerca', 'GeocercaController@agregar');
    Route::post('/geocercas/eliminar-geocerca/{id}', 'GeocercaController@eliminar');
    
});













