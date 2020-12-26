<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registrar(Request $request) {

        $validar= $request->validate([
            'name' => 'required|max:10',
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $validar['password'] = bcrypt($validar["password"]);

        $user = User::create($validar);

        $token = $user->createToken('authToken')->accessToken;

        return response(['Usuario' => $user,'access_token' =>$token]);

    }

    public function login(Request $request) {

        $validar= $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($validar)) {
            return response(['message' => 'Credenciales no validas']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['Usuario' => auth()->user(), 'access_token' => $accessToken]);


    }
}
