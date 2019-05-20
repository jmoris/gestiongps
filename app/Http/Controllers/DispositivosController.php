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

					return view('dispositivos.home', ['dis' => json_decode($respuesta)]);
	}

	public function agregar(Request $request){
        $fields = [
            'name' => $request->nombre,
            'uniqueId' => $request->imei,
            'phone' => $request->telefono,
            'model' => $request->modelo,
            'contact' => $request->contacto,
            'category' => $request->cateogria
        ];
        $fields_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/dispositivos');
	}
	
	public function modificar(Request $request, $id){
        /*
        $fields = [
            'name' => $request->nombre,
            'uniqueId' => $request->imei,
            'phone' => $request->telefono,
            'model' => $request->modelo,
            'contact' => $request->contacto,
            'category' => $request->cateogria
        ];
        */


        $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices');
                    curl_setopt($ch, CURLOPT_POST, FALSE);
                    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $respuesta = curl_exec ($ch);
                    curl_close ($ch);

        $dispositivos = json_decode($respuesta);
        $buscado;

        foreach ($dispositivos as $dis) {
            if($dis->uniqueId == $id)
            {
                $buscado = $dis;
                break;
            }
        }

        $buscado->name = $request->nombre;
        $buscado->uniqueId = $request->imei;
        $buscado->phone = $request->telefono;
        $buscado->model= $request->modelo;
        $buscado->contact = $request->contacto;
        $buscado->category = $request->categoria;

        
        $fields_string = json_encode($buscado);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/dispositivos');
    }

    public function eliminar(Request $request, $id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, ENV('API_ENDPOINT').'/devices/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));

        curl_close($ch);
        return redirect('dispositivos');
    }

    public function vistaEditarDispositivo($id)
    {

        $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices');
                    curl_setopt($ch, CURLOPT_POST, FALSE);
                    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $respuesta = curl_exec ($ch);
                    curl_close ($ch);

        $dispositivos = json_decode($respuesta);
        $buscado;

        foreach ($dispositivos as $dis) {
            if($dis->uniqueId == $id)
            {
                $buscado = $dis;
                break;
            }
        }
        
       //return print_r($buscado,true);


       return view('dispositivos.modificar', ['dispositivo' => (object)$buscado]);
    }

}