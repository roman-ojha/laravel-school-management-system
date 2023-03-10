<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Exception;
use App\Models\Teacher;
use App\Models\Book;
use App\Models\Faculty;
use App\Models\Library;
use App\Models\Subject;
use App\Models\LibraryStudent;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function students()
    {
        $students = Student::select(['id', 'name', 'batch', 'roll', 'faculty_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return view('admin/students', ['students' => $students]);
    }

    public function add_student_view()
    {
        $faculties = Faculty::select(['id', 'name'])->get();
        return view('admin/add_student', ['error' => '', 'faculties' => $faculties]);
    }

    public function add_student(Request $req)
    {
        try {
            if (!$req->filled('name') || !$req->filled('roll') || !$req->filled('batch') || !$req->filled('faculty')) {
                $faculties = Faculty::select(['id', 'name'])->get();
                return view('admin/add_student', ['error' => 'All field is required', 'faculties' => $faculties]);
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
                return view('admin/add_student', ['error' => 'Server Error!!!', 'faculties' => $faculties]);
            }
            return redirect()->route('admin-students');
        } catch (Exception $err) {
            // error_log($err);
            return view('admin/add_student', ['error' => 'Server Error!!!']);
        }
    }

    public function delete_student(Request $req, $id)
    {
        $student = Student::find($id);
        $student->delete();

        $newStudents = Student::all();

        // $studentsListComp = new StudentsList($newStudents);
        // return $studentsListComp->render();
        return view('components.students-list', ['students' => $newStudents]);
    }

    public function teachers()
    {
        $teachers = Teacher::select(['id', 'name', 'salary',])->with(['teaches' => function ($q) {
            $q->select('name');
        }, 'faculties' => function ($q) {
            $q->select('name');
        }])->get();
        return view('admin.teachers', ['teachers' => $teachers]);
    }

    public function add_teacher(Request $req)
    {
        try {
            if (!$req->filled('name') || !$req->filled('salary')) {
                return view('admin/add_teacher', ['error' => "All field is required"]);
            }
            $teacher = new Teacher();
            $teacher->name = $req->input('name');
            $teacher->salary = $req->input('salary');
            $saved = $teacher->save();
            $teacher->teaches()->attach($req->input('teaches'));
            $teacher->faculties()->attach($req->input('faculties'));
            if (!$saved) {
                return view('admin/add_teacher', ['error' => 'Server Error!!!']);
            }
            return redirect()->route('admin-teachers');
        } catch (Exception $err) {
            return view('admin/add_teacher', ['error' => 'Server Error!!!']);
        }
    }

    public function delete_teacher(Request $req, $id)
    {
        try {
            $teacher = Teacher::find($id);
            $teacher->teaches()->detach();
            $teacher->faculties()->detach();
            $teacher->delete();

            $new_teachers = Teacher::all();

            return view('components.teachers-list', ['teachers' => $new_teachers]);
        } catch (Exception $err) {
        }
    }

    public function books()
    {
        $books = Book::all();
        return view('admin.books', ['books' => $books]);
    }

    public function add_book(Request $req)
    {
        try {
            if (!$req->filled('name') || !$req->filled('publication') || !$req->filled('released_on') || !$req->filled('page')) {
                return view('admin/add_book', ['error' => "All Field is required"]);
            }
            $book = new Book();
            $book->name = $req->input('name');
            $book->publication = $req->input('publication');
            $book->released_on = $req->input('released_on');
            $book->page = $req->input('page');
            $saved = $book->save();
            if (!$saved) {
                return view('admin/add_book', ['error' => 'Server Error!!!']);
            }
            return redirect()->route('admin-books');
        } catch (Exception $err) {
            return view('admin/add_book', ['error' => 'Server Error!!!']);
        }
    }

    public function delete_book(Request $req, $id)
    {
        try {
            Book::find($id)->delete();
            $books = Book::all();
            return view('components.books-list', ['books' => $books]);
        } catch (Exception $err) {
        }
    }

    public function faculties()
    {
        $faculties = Faculty::all();

        return view('admin/faculties', ['faculties' => $faculties]);
    }

    public function add_faculty(Request $req)
    {
        if (!$req->filled('name')) {
            return view('admin/add_faculty', ['error' => "All field is required"]);
        }
        $faculty = new Faculty();
        $faculty->name = $req->input('name');
        $saved = $faculty->save();
        if (!$saved) {
            return view('admin/add_faculty', ['error' => "Server Error!!!"]);
        }
        return redirect()->route('admin-faculties');
    }

    public function delete_faculty(Request $req, $id)
    {
        $faculty = Faculty::find($id);
        $faculty->teachers()->detach();
        $faculty->delete();
        $faculties = Faculty::all();
        return view('components.faculties-list', ['faculties' => $faculties]);
    }

    public function subjects()
    {
        $subjects = Subject::all();

        return view('admin.subjects', ["subjects" => $subjects]);
    }

    public function get_subjects_and_faculties_api()
    {
        $subjects = Subject::select(["id", "name"])->get();
        $faculties = Faculty::select(["id", "name"])->get();
        return ['subjects' => $subjects, 'faculties' => $faculties];
    }

    public function add_subject(Request $req)
    {
        try {
            if (!$req->filled('name')) {
                return view('admin/add_subject', ['error' => "All field is required"]);
            }
            $subject = new Subject();
            $subject->name = $req->input('name');
            $saved = $subject->save();
            if (!$saved) {
                return view('admin/add_subject', ['error' => "Server Error!!!"]);
            }
            return redirect()->route('admin-subjects');
        } catch (Exception $err) {
        }
    }

    public function delete_subject(Request $req, $id)
    {
        try {
            $subject = Subject::find($id);
            $subject->teachers()->detach();
            $subject->delete();
            $new_subject = Subject::all();
            return view('components/subjects-list', ['subjects' => $new_subject]);
        } catch (Exception $err) {
        }
    }


    public function book_self()
    {
        $book_self = Library::select(['id', 'quantity', 'remaining', 'book_id'])->with(['book' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return view('admin/book-self', ['book_self' => $book_self]);
    }

    public function get_books_for_book_self_api()
    {
        $books = Book::select(['id', 'name'])->with(['library' => function ($q) {
            $q->select('id', 'book_id');
        }])->whereDoesntHave('library')->get();
        return $books;
    }

    public function add_book_into_book_self(Request $req)
    {
        try {
            if (!$req->filled('book') || !$req->filled('quantity')) {
                return view('admin/add_book_self', ['error' => "All field is required"]);
            }
            $library = new Library();
            $library->book_id = $req->input('book');
            $library->quantity = $req->input('quantity');
            $library->remaining = $req->input('quantity');
            $saved = $library->save();
            if (!$saved) {
                return view('admin/add_book_self', ['error' => "Server Error!!!"]);
            }
            return redirect()->route('admin-library-book_self');
        } catch (Exception $err) {
        }
    }

    public function library_student_records()
    {
        $library_students = Student::select(['id', 'name', 'roll', 'batch', 'faculty_id'])->with(['library' => function ($qLibrary) {
            $qLibrary->select(['book_id'])->with(['book' => function ($qBook) {
                $qBook->select(['id', 'name']);
            }]);
        }, 'faculty' => function ($qFaculty) {
            $qFaculty->select(['id', 'name']);
        }])->whereHas('library')->get();

        return view("pages/library/student-records", ['library_students' => $library_students]);
    }

    public function get_student_api()
    {
        $students = Student::select(['id', 'name', 'roll', 'batch', 'faculty_id'])->with(['faculty' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return $students;
    }

    public function get_library_books()
    {
        $libraryBooks = Library::select(['id', 'book_id'])->with(['book' => function ($q) {
            $q->select(['id', 'name']);
        }])->get();
        return $libraryBooks;
    }

    public function library_add_student_record(Request $req)
    {
        try {

            if (!$req->filled('student') || !$req->filled('book')) {
                return view('pages/library/add-new-student-record', ['error' => "All field is required"]);
            }
            $student = $req->input('student');
            $book = $req->input('book');
            $library_Student = new LibraryStudent();
            $library_Student->student_id = $student;
            $library_Student->library_id = $book;
            if ($library_Student->save()) {
                Library::find($book)->decrement('quantity');
                return redirect()->route('library-student-records');
            }
            return view('pages/library/add-new-student-record', ['error' => "Server Error!!!"]);
        } catch (Exception $err) {
            return view('pages/library/add-new-student-record', ['error' => "Server Error!!!"]);
        }
    }
}
