<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Exception;
use Ramsey\Uuid\Type\Integer;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function students()
    {
        // $students = Student::all();
        $students = Student::all();
        return view('admin/students', ['students'=>$students]);
    }

    public function create_student(Request $req)
    {
        try {
            if (!$req->filled('name')||!$req->filled('roll')||!$req->filled('batch')) {
                return view('admin/add_student', ['error'=>'All field is required']);
            }
            $name = $req->input('name');
            $roll = $req->input('roll');
            $batch = $req->input()['batch'];

            $student = new Student();
            $student->name = $name;
            $student->roll = $roll;
            $student->batch = $batch;
            // Todo...
            $student->faculty_id = 1;
            $saved = $student->save();
            if (!$saved) {
                return view('admin/add_student', ['error'=>'Server Error!!!']);
            }
            return redirect()->route('admin.students');
        } catch(Exception $err) {
            return view('admin/add_student', ['error'=>'Server Error!!!']);
        }
    }

    public function delete_student(Request $req, $id)
    {
        $student = Student::find($id);
        $student->delete();
    }
}
