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
        $login = $request->input("login");
        $password = $request->input("password");

        $user = User::where('login', $login)->first();

        if (!$user || !Hash::check($password, $user->password))
            return redirect("/")->withErrors(['login' => 'Nieprawidłowy login lub hasło.']);

        Auth::login($user);

        return redirect("/")->with("success", "Udana autoryzacja");
    }

    public  function logout()
    {
        Auth::logout();
        return redirect("/")->with("success", "Wylogowano z konta");
    }
}
