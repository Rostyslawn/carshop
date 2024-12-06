<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthorizationContoller extends Controller
{
    public function signin(Request $request)
    {
        $login = $request->login;
        $password = $request->password;

        $user = User::where('login', $login)->first();

        if (!$user || !Hash::check($password, $user->password))
            return redirect("/")->withErrors(['login' => 'Неправильный логин или пароль.']);

        Auth::login($user);

        return redirect("/")->with("success", "Успешная авторизация");
    }

    public  function logout()
    {
        Auth::logout();
        return redirect("/")->with("success", "Вы вышли с аккаунта");
    }
}
