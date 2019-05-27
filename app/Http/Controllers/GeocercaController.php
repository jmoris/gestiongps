<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeocercaController extends Controller
{
    /**
     * Metodo para obtener las geocercas almacenadas en la API.
     * @author Rodrigo Cordero
     */
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

    /**
     * Metodo para agregar geocercas y guardarlos en la API.
     * @author Rodrigo Cordero
     */
    public function agregar(Request $request){

      $this->validate($request,[
        'nombre' => 'required',
        'area' => 'required'
      ]);
  
      $fields = [
        'name' => $request->nombre,
        'description' => $request->descripcion,
        'area' => $request->area
        ];
  
        $fields_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/geofences');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);  
        return redirect('/geocercas');
      }

      /**
     * Metodo para poder mostrar la interfaz grafica en el navegador.
     * @author Rodrigo Cordero
     */
      public function vistaAgregarGeocerca(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/server');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return view('geocercas.agregar-geocerca', ['servidor' => json_decode($respuesta)]);
      }
}
