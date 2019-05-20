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


  

  public function editarPrivilegioDeAdmin(Request $request, $id){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users');
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);

    $usuarios = json_decode($respuesta);
    $target;

    foreach ($usuarios as $usuario){
      if($usuario->id == $id){
        $target = $usuario;
        break;
      }
    }

    $target-> administrator = $request->administrador;

    $fields_string = json_encode($target);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users/'.$id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);
    return redirect('/usuarios');
    //return $respuesta;
  } 

}

