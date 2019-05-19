<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller{
  public function mostrar(){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users');
                curl_setopt($ch, CURLOPT_POST, FALSE);
                curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec ($ch);
                curl_close ($ch);

                return view('usuarios.home', ['usuarios' => json_decode($respuesta)]);
  }

  public function darAdmin()
  {

  }

  public function quitarAdmin()
  {
    
  }
}
