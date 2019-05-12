<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServidorController extends Controller
{

    public function obtener()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/server');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get(‘email’). ":" . \Session::get(‘password));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return view('servidor', ['servidor' => json_decode($respuesta)]);
    }

    public function guardar(Request $request){
        
        $fields = [
        '$registration' => $request->check_servidor,
        '$deviceReadonly' => $request->check_dispositivo,
        '$latitude' => $request->latitud,
        '$longitude' => $request->longitud,
        '$zoom' => $request->zoom
        ];

        $fields_string = http_build_query($fields);
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
