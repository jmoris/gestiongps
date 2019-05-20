<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoferesController extends Controller
{
    public function mostrar(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);

        return view('choferes.home', ['chof' => json_decode($respuesta)]);
    }

    public function agregar(Request $request){
        $fields = [
            'name' => $request->nombre,
            'uniqueId' => $request->rut,
        ];
        $fields_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/choferes');
	}
    
    public function modificar(Request $request, $id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
    
        $choferes = json_decode($respuesta);
        $target;
    
        foreach ($choferes as $chofer){
            if($chofer->id == $id){
                $target = $chofer;
                break;
            }
        }
    
        $target->name = $request->nombre;
        $target->uniqueId = $request->rut;
    
        $fields_string = json_encode($target);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/choferes');
    }  
    
    public function vistaModificar($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
    
        $choferes = json_decode($respuesta);
        $target;
    
        foreach ($choferes as $chofer){
            if($chofer->id == $id){
                $target = $chofer;
                break;
            }
        }
        return view('choferes.modificar', ['chofer' => (object)$target]);
    }

    public function eliminar($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/choferes');
    }

    public function asignarDispositivo(Request $request){
        $fields = [
            'driverId' => $request->chofer,
            'deviceId' => $request->dispositivo,
        ];
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/permissions');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'Post');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/choferes');
    }

    public function vistaAsignarDispositivo($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
    
        $choferes = json_decode($respuesta);
        $target;
    
        foreach ($choferes as $chofer){
            if($chofer->id == $id){
                $target = $chofer;
                break;
            }
        }

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices');
		curl_setopt($ch, CURLOPT_POST, FALSE);
		curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta = curl_exec ($ch);
		curl_close ($ch);

        return view('choferes.asignarDispositivo', ['chofer' => (object)$target, 'dispositivos' => json_decode($respuesta)]);
    }
}
