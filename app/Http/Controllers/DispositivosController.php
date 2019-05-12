<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivosController extends Controller{

	public function mostrar(){
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices');
					curl_setopt($ch, CURLOPT_POST, FALSE);
					curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$respuesta = curl_exec ($ch);
					curl_close ($ch);

					return view('dispositivos.home', ['dispositivos' => json_decode($respuesta)]);
	}

	public function ingresar(){
		//logica
	}
}