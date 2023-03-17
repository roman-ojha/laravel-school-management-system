<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $req)
    {
        if (Auth::check()) {
            $user = $req->user();
            return view('pages.index', ['user' => $user]);
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
