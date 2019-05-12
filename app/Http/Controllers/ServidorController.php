<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServidorController extends Controller
{

    public function obtener(Requiest $request)
    {
        
    }

    public function guardar(){
        
        $fields = [
        '$check_servidor' => $request->check_servidor,
        '$check_dispositivo' => $request->check_dispositivo,
        '$latitud' => $request->latitud,
        '$longitud' => $request->longitud,
        '$zoom' => $request->zoom
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/server');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);

        return view('servidor', ['servidor' => json_decode($respuesta)]);
    }
}
