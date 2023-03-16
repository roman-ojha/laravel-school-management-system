<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use Exception;

class StudentController extends Controller
{
    public function students()
    {
        $students = Student::select(['id', 'name', 'batch', 'roll', 'faculty_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
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
        try {
            if (!$req->filled('name') || !$req->filled('roll') || !$req->filled('batch') || !$req->filled('faculty')) {
                $faculties = Faculty::select(['id', 'name'])->get();
                return view('pages/student/add_student', ['error' => 'All field is required', 'faculties' => $faculties]);
            }
            $name = $req->input('name');
            $roll = $req->input('roll');
            $batch = $req->input()['batch'];

            $student = new Student();
            $student->name = $name;
            $student->roll = $roll;
            $student->batch = $batch;
            $student->faculty_id = $req->input('faculty');
            $saved = $student->save();
            if (!$saved) {
                $faculties = Faculty::select(['id', 'name'])->get();
                return view('pages/student/add_student', ['error' => 'Server Error!!!', 'faculties' => $faculties]);
            }
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
}
