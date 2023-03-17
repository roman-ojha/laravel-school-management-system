<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Book;
use App\Models\Student;
use App\Models\LibraryStudent;
use Exception;

class LibraryController extends Controller
{
    public function book_self()
    {
        $book_self = Library::select(['id', 'quantity', 'remaining', 'book_id'])->with(['book' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return view('pages.library.book-self', ['book_self' => $book_self]);
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
                return view('pages.library.add_book_self', ['error' => "All field is required"]);
            }
            $library = new Library();
            $library->book_id = $req->input('book');
            $library->quantity = $req->input('quantity');
            $library->remaining = $req->input('quantity');
            $saved = $library->save();
            if (!$saved) {
                return view('pages.library.add_book_self', ['error' => "Server Error!!!"]);
            }
            return redirect()->route('book-self');
        } catch (Exception $err) {
            return view('pages.library.add_book_self', ['error' => "Server Error!!!"]);
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
        error_log($library_students);

        return view("pages.library.student-records", ['library_students' => $library_students]);
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
                return view('pages.library.add-new-student-record', ['error' => "All field is required"]);
            }
            $student = $req->input('student');
            $book = $req->input('book');
            $library_Student = new LibraryStudent();
            $library_Student->student_id = $student;
            $library_Student->library_id = $book;
            if ($library_Student->save()) {
                Library::find($book)->decrement('remaining');
                return redirect()->route('library-student-records');
            }
            return view('pages.library.add-new-student-record', ['error' => "Server Error!!!"]);
        } catch (Exception $err) {
            return view('pages.library.add-new-student-record', ['error' => "Server Error!!!"]);
        }
    }

    public function delete_book_from_book_self(Request $req, $id)
    {
        try {
            $library = Library::find($id);
            $library->students()->detach();
            $library->teachers()->detach();
            $library->delete();
            $library = Library::all();
            return view('components.book-self-book-list', ['book_self' => $library]);
        } catch (Exception $err) {
        }
    }

    public function delete_student_record(Request $req, $student_id, $book_id)
    {
        error_log($student_id);
        error_log($book_id);
    }
}
