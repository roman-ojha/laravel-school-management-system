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
    public function login()
    {
    }

    public function register(Request $req)
    {
        try {

            $req->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
            $name = $req->input('name');
            $email = $req->input('email');
            $password = $req->input('password');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            if ($user->save()) {
                return redirect('/');
            }
        } catch (Exception $err) {
        }
    }
}
