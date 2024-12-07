<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPanelController extends Controller
{
    public function createUser()
    {
        return view("createUser");
    }

    public function createUserRequest(Request $request)
    {
        if(!$request) return;

        $login = $request->login;
        $password = $request->password;

        $user = new \App\Models\User();
        $user->login = $login;
        $user->password = Hash::make($password);
        $user->status = false;
        $user->save();

        return redirect('/')->with('success', 'Użytkownik został utworzony');
    }
}
