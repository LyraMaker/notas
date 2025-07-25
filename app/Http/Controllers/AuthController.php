<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        ob_start();

        echo "<div style='text-align:center;'>
        <img src='https://media.tenor.com/3eIvVsG3yPYAAAAM/the-universe-tim-and-eric-mind-blown.gif' width='200px'><br>
        <h2>Se fudeu!</h2>
      </div>";

        ob_flush();
        flush();

        session()->forget('user');
    }

    public function submitForm(Request $request)
    {
        $this->validateInputs($request);
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        $user = User::where('username', $username)
            ->where('deleted_at', null)
            ->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Credencial inválida!');
        }

        if (!password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Credencial inválida!');
        }

        $user->last_login = date("Y-m-d H:i:s");
        $user->save();

        session([
            'user' =>
            [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);
        return redirect('/');
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
