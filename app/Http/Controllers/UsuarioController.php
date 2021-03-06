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

  public function quitarAdmin()
  {

  }
  public function editarPrivilegioDeUsuario(Request $request, $id){

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

    $target->disabled = $request->deshabilitado;

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

  public function agregar(Request $request){
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
      'expirationTime' => date('Y-m-d', strtotime($request->fechaexp))
      ];

      $fields_string = json_encode($fields);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec ($ch);
      curl_close ($ch);
     
     // return $respuesta;
    return redirect('/usuarios');
  }

   public function modificar(Request $request, $id){
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

    $target->deviceReadonly = ($request->editDisp)?'true':'false';
    $target->readonly = ($request->permLect)?'true':'false';
    $target->name = $request->nombre;
    $target->password = $request->pass;
    $target->email = $request->email;
    $target->expirationTime = date('Y-m-d', strtotime($request->fechaexp));
 
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
  
  public function eliminar($id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users/'.$id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    $respuesta = curl_exec ($ch);
    curl_close ($ch);
    return redirect('/usuarios');
  }

  public function vistaEditarUsuario($id){
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
    return view('usuarios.editar-usuario', ['usuario' => (object)$target]);
  }

  public function addUsuarioView(){
    return view('usuarios.agregar-usuario');
  }

  public function verUsuario($id){
    
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


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices?userId='.$id);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);

    $dispositivos = json_decode($respuesta);

    //return print_r($dispositivos,true);

    return view('usuarios.ver-usuario', ['usuario' => (object)$target , 'dispositivos'=> (object)$dispositivos]);
  }

  
  public function asignarDispositivo(Request $request){
    $fields = [
        'userId' => $request->usuario,
        'deviceId' => $request->dispositivo,
    ];
    $fields_string = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/permissions');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);
    return redirect('/usuarios');
  }
  public function vistaAsignarDispositivo($id){
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

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices?all=true');
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);
    $arr1 = json_decode($respuesta);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices?userId='.$target->id);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec ($ch);
    curl_close ($ch);

    $arr2 = json_decode($respuesta);
    $diff = array_udiff($arr1, $arr2,
        function ($obj_a, $obj_b) {
        return $obj_a->id - $obj_b->id;
        }
    );
      return view('usuarios.asignarDispositivo', ['usuario' => (object)$target, 'dispositivos' => $diff]);
  }
}

