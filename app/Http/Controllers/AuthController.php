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

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
            ->withErrors($validator)
            ->withInput();
        }
        
        return view('home');
    }
}
