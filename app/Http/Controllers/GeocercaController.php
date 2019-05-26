<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeocercaController extends Controller
{

    public function obtener()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/geofences');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return view('geocercas.home', ['geocercas' => json_decode($respuesta)]);
    }

    public function guardar(Request $request){

        $fields_string = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/geofences');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        
        return redirect('/geocercas');
    }
}
