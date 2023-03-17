<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Exception;

class BookController extends Controller
{
    public function books()
    {
        $books = Book::all();
        return view('pages.book.index', ['books' => $books]);
    }

    public function add_book(Request $req)
    {
        try {
            if (!$req->filled('name') || !$req->filled('publication') || !$req->filled('released_on') || !$req->filled('page')) {
                return view('pages.book.add_book', ['error' => "All Field is required"]);
            }
            $book = new Book();
            $book->name = $req->input('name');
            $book->publication = $req->input('publication');
            $book->released_on = $req->input('released_on');
            $book->page = $req->input('page');
            $saved = $book->save();
            if (!$saved) {
                return view('pages.book.add_book', ['error' => 'Server Error!!!']);
            }
            return redirect()->route('books');
        } catch (Exception $err) {
            return view('pages.book.add_book', ['error' => 'Server Error!!!']);
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
}
