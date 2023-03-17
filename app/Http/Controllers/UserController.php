<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $req)
    {
        if (Auth::check()) {
            // for student
            $user = Student::where('id', '=', $req->user()->student['id'])->select(['id', 'roll', 'batch', 'faculty_id', 'user_id'])->with(['library' => function ($q) {
                $q->select('book_id')->with(['book' => function ($qBook) {
                    $qBook->select('id', 'name');
                }]);
            }, 'user' => function ($q) {
                $q->select('id', 'name', 'email');
            }, 'faculty' => function ($q) {
                $q->select('id', 'name');
            }])->first();
            error_log($user);
            return view('pages.index', ['user' => $user]);
        }
        return redirect()->route('login')->with(['error' => "Please login first"]);
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flush();
        $req->session()->regenerate();
        return redirect()->route('login');
    }
}
