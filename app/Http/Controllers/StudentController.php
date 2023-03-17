<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\User;
use Exception;
use Hash;

class StudentController extends Controller
{
    public function get_students()
    {
        return Student::select(['id', 'batch', 'roll', 'faculty_id', 'user_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
        }, 'user' => function ($q) {
            $q->select('id', 'name', 'email');
        }])->get();
    }

    public function students()
    {
        return view('pages/student/index', ['students' => $this->get_students()]);
    }

    public function add_student_view()
    {
        return view('pages/student/add_student');
    }

    public function add_student(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'roll' => 'required',
            'batch' => 'required',
            'faculty' => 'required',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required|min:6|max:15',
        ]);
        try {
            $name = $req->input('name');
            $roll = $req->input('roll');
            $batch = $req->input()['batch'];
            $student = new Student();
            $student->roll = $roll;
            $student->batch = $batch;
            $student->faculty_id = $req->input('faculty');
            $user = new User();
            $user->name = $name;
            $user->email = $req->input('email');
            $user->password = Hash::make($req->input('password'));
            $user->save();
            $user->student()->save($student);
            return redirect()->route('students');
        } catch (Exception $err) {
            // error_log($err);
            return view('pages/student/add_student', ['error' => 'Server Error!!!']);
        }
    }

    public function delete_student(Request $req, $id)
    {
        $user = User::find($id);
        $user->student->library()->detach();
        $user->student()->delete();
        $user->delete();

        return view('components.students-list', ['students' => $this->get_students()]);
    }

    public function get_students_api()
    {
        return $this->get_students();
    }
}
