<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Exception;
use App\Models\Teacher;
use App\Models\Book;

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

    public function add_student(Request $req)
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
            return redirect()->route('admin-students');
        } catch(Exception $err) {
            // error_log($err);
            return view('admin/add_student', ['error'=>'Server Error!!!']);
        }
    }

    public function delete_student(Request $req, $id)
    {
        $student = Student::find($id);
        $student->delete();

        $newStudents = Student::all();

        // $studentsListComp = new StudentsList($newStudents);
        // return $studentsListComp->render();
        return view('components.students-list', ['students'=>$newStudents]);
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('admin.teachers', ['teachers'=>$teachers]);
    }

    public function add_teacher(Request $req)
    {
        try {
            if (!$req->filled('name')||!$req->filled('salary')) {
                return view('admin/add_teacher', ['error'=>"All field is required"]);
            }
            $teacher = new Teacher();
            $teacher->name = $req->input('name');
            $teacher->salary = $req->input('salary');
            $saved = $teacher->save();
            if (!$saved) {
                return view('admin/add_teacher', ['error'=>'Server Error!!!']);
            }
            return redirect()->route('admin-teachers');
        } catch(Exception $err) {
            return view('admin/add_teacher', ['error'=>'Server Error!!!']);
        }
    }

    public function delete_teacher(Request $req, $id)
    {
        try {
            Teacher::find($id)->delete();

            $new_teachers = Teacher::all();

            return view('components.teachers-list', ['teachers'=>$new_teachers]);
        } catch(Exception $err) {
        }
    }

    public function books()
    {
        $books = Book::all();
        return view('admin.books', ['books'=>$books]);
    }

    public function add_book(Request $req)
    {
        try {
            if (!$req->filled('name')||!$req->filled('publication')||!$req->filled('released_on')||!$req->filled('page')) {
                return view('admin/add_book', ['error'=>"All Field is required"]);
            }
            $book = new Book();
            $book->name = $req->input('name');
            $book->publication = $req->input('publication');
            $book->released_on = $req->input('released_on');
            $book->page = $req->input('page');
            $saved = $book->save();
            if (!$saved) {
                return view('admin/add_book', ['error'=>'Server Error!!!']);
            }
            return redirect()->route('admin-books');
        } catch(Exception $err) {
            return view('admin/add_book', ['error'=>'Server Error!!!']);
        }
    }
}
