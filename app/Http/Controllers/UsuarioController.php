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

  public function addUsuario(Request $request){
    $this->validate($request,[
      'nombre' => 'required',
      'email' => 'required',
      'pass' => 'required',
      'fechaexp' => 'required',
    ]);

    $fields = [
      'deviceReadonly' => ($request->editDisp)?'true':'false',
      'readonly' => ($request->permLect)?'true':'false',
      'name' => $request->nombre,
      'password' => $request->pass,
      'email' => $request->email,
      'expirationTime' => $request->fechaExp
      ];

      $fields_string = json_encode($fields);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/server');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
      curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec ($ch);
      curl_close ($ch);

      return redirect('/usuarios')->with('success', 'datos guardados!');
  }
}
