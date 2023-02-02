<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function students()
    {
        return view('admin/students');
    }

    public function create_student(Request $req)
    {
        // return view('admin/add_student');
        $name = $req->input()['name'];
        $roll = $req->input()['roll'];
        $batch = $req->input()['batch'];
        error_log($name.$roll.$batch);

        return redirect()->route('admin.students');
    }
}
