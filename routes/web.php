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
    return view('welcome');
});
<<<<<<< HEAD
Route::get('/home', function() {
    return view('home');
});
Route::post('/login', 'AuthController@login');
=======

Route::post('/login', 'AuthController@conectar');

Route::get('/login', function(){ return view('login'); });

Route::post('/logout', 'AuthController@desconectar');   