<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Metodo para iniciar sesión a traves de la API.
     * @author Jesús Moris (jesus[at]soluciontotal.cl)
     * @version 2019-05-03
     */
    public function conectar(Request $request){
        $input = $request->only(['email', 'password']);

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Session::put('error_login', 'Todos los campos son obligatorios.');
            return redirect('/login')
            ->withInput();
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/session');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$request['email']."&password=".$request['password']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec ($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);

        if($http_status == 200){
            return redirect('/home');
        }else if($http_status == 401){
            Session::put('error_login', 'Email/clave incorrectos.');
            return redirect('/login')
            ->withInput();
        }else if($http_status == 500){
            return 'Hubo un error en el servidor...';
        }
        return $http_status;
    }
}
