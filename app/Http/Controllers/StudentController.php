<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\User;
use Exception;

class StudentController extends Controller
{
    public function students()
    {
        $students = Student::select(['id', 'batch', 'roll', 'faculty_id', 'user_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
        }, 'user' => function ($q) {
            $q->select('id', 'name', 'email');
        }])->get();
        return view('pages/student/index', ['students' => $students]);
    }

    public function add_student_view()
    {
        $faculties = Faculty::select(['id', 'name'])->get();
        return view('pages/student/add_student', ['error' => '', 'faculties' => $faculties]);
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
            $student->name = $name;
            $student->roll = $roll;
            $student->batch = $batch;
            $student->faculty_id = $req->input('faculty');
            $user = new User();
            $user->name = $name;
            $user->email = $req->input('email');
            $user->password = $req->input('password');
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
        $student = Student::find($id);
        $student->library()->detach();
        $student->delete();

        $newStudents = Student::all();

        // $studentsListComp = new StudentsList($newStudents);
        // return $studentsListComp->render();
        return view('components.students-list', ['students' => $newStudents]);
    }

    public function get_student_api()
    {
        $students = Student::select(['id', 'name', 'roll', 'batch', 'faculty_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return $students;
    }
}
