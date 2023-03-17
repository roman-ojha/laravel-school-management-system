<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Session;
use Hash;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return redirect()->route('login')->with(['error' => "user doesn't exist with given credentials", 'email' => $req->input('email'), 'password' => $req->input('password')]);
    }

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required|min:6|max:15',
        ]);
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        if ($user->save()) {
            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect('/');
            }
        }
    }

    public function index(Request $req)
    {
        if (Auth::check()) {
            error_log($req->user());
            return view('pages.index');
        }
        return redirect()->route('login')->with(['error' => "Please login first"]);
    }

    public function sign_out(Request $req)
    {
        Auth::logout();
        $req->session()->flush();
        $req->session()->regenerate();
        return redirect()->route('login');
    }
}
