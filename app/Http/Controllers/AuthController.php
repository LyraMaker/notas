<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        return view('logout');
    }

    public function submitForm(Request $request){
        $this->validateInputs($request);
        
        echo "ok";
    }

    public function validateInputs(Request $request)
    {
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required'
            ],
            [
                'text_username.required' => "O nome do usuário é obrigatório!",
                'text_username.email' => "Precisa ser um email válido!",
                'text_password.required' => "Você precisa digitar uma senha!",
                
            ]
        );
    }
}
