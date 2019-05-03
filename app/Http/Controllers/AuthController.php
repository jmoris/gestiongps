<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Metodo para iniciar sesión a traves de la API.
     * @author Jesús Moris (jesus[at]soluciontotal.cl)
     * @version 2019-05-03
     */
    public function login(Request $request){
        $input = $request->only(['email', 'password']);
        $validacion = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        return $request->all();
    }
}
