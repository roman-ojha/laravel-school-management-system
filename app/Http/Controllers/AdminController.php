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

    public function create_student()
    {
        return view('admin/add_student');
    }
}
