<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SecurityRequest;

class SecurityController extends Controller
{
    public function formLogin()
    {
        return view('security.form-login');

    }

    public function prosesLogin(SecurityRequest $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");
        $user = User::where("username", $username)->where("password", $password)->first();

        if($user == null) {
            return redirect (route("login"));
        }
        
        Auth::login($user);

        return redirect(route("penulis.index"));
       
        // Proses login
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route("login"));
        // Proses logout
    }
}