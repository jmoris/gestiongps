<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoferesController extends Controller
{
    public function mostrar(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers?all=true');
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);

        return view('choferes.home', ['chof' => json_decode($respuesta)]);
    }

    /**
     * Se implementa metodo para mostrar la vista agregar dispositivos.
     * @author Jesus Moris
     */
    public function vistaAgregar(){
        return view('choferes.agregar');
    }

    public function agregar(Request $request){
        $fields = [
            'name' => $request->nombre,
            'uniqueId' => $request->rut,
        ];
        $fields_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers?all=true');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect('/choferes');
    }
    /**
     * Se implementa metodo para agregar un grupo.
     * @author Jesus Moris
     */
    public function agregarGrupo(Request $request){
        $fields = [
            'name' => $request->nombre,
        ];
        $fields_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/groups?all=true');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect()->back();
    }
    /**
     * Se implementa metodo para eliminar un grupo.
     * @author Jesus Moris
     */
    public function eliminarGrupo($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/groups/'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        curl_close ($ch);
        return redirect()->back();
    }
    
    public function modificar(Request $request, $id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers?all=true');
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

    public function asignarGrupo(Request $request){
        $fields = [
            'groupId' => $request->grupo,
            'driverId' => $request->chofer
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

    public function vistaAsignarGrupo($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/drivers?all=true');
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
		curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/groups?all=true');
		curl_setopt($ch, CURLOPT_POST, FALSE);
		curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta = curl_exec ($ch);
		curl_close ($ch);

        return view('choferes.asignarGrupo', ['chofer' => (object)$target, 'grupos' => json_decode($respuesta)]);
    }
}
