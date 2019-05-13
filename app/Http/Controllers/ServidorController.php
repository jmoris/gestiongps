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
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return view('servidor', ['servidor' => json_decode($respuesta)]);
    }

    public function guardar(Request $request){

        $fields= [];

        if((intval($request->latitud) > -91) && (intval($request->latitud) <91))
        {
            if((intval($request->longitud) > -181) &&(intval($request->longitud) < 181))
            {
                if ($request->zoom > 0)
                {
                    $fields = [
                        'readonly' => ($request->check_servidor)?'true':'false',
                        'mapUrl' => 'https://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}&s=Ga',
                        'map' => 'custom',
                        'deviceReadonly' => ($request->check_dispositivos)?'true':'false',
                        'registration' => ($request->check_registro)?'true':'false',
                        'latitude' => $request->latitud,
                        'longitude' => $request->longitud,
                        'zoom' => $request->zoom
                        ];
                }
                else
                {
                    return redirect('/servidor')
                    ->with('error_servidor', 'El zoom debe ser mayor a 0.')
                    ->withInput(); 
                }
            }
            else
            {
                return redirect('/servidor')
                ->with('error_servidor', 'La latitud debe ser entre -180 y 180.')
                ->withInput();
            }
        }
        else
        {
            return redirect('/servidor')
            ->with('error_servidor', 'La longitud debe ser entre -90 y 90.')
            ->withInput();
        }

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
        
        return redirect('/servidor');
    }
}
