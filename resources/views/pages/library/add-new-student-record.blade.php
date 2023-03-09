@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
@endsection

@section('style')
    @parent
    <style>
        form {
            border: 2px solid black;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        input[type="submit"] {
            padding: 10px;
            border-radius: 5px;
            border-width: 1px;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        .student-record-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .student-record-button a {
            text-decoration: none;
            color: black;
        }
    </style>

@endsection

@section('title', 'library/add-new-student-record')

@section('main')
    <h1>Library: Add student record</h1>
    <form action="{{ route('library-add-student-record') }}" method="POST">
        @csrf
        <div>
            <label for="students">Select Student</label>
            <select name="student" id="students">
            </select>
        </div>
        <div>
            <label for="books">Select Book</label>
            <select name="book" id="books">

            </select>
        </div>
        <div>
            <input type="submit" value="Add" />
        </div>
    </form>
    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif
    <div class="student-record-button">
        <a href="{{ route('library-student-records') }}">Show Student Records</a>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        (async () => {
            // Fetch student data
            const resStudents = await fetch("/api/admin/students");
            const students = await resStudents.json();
            let studentSelectOptionsElm = "<option value='' default>Select Student</option>"
            students.forEach((student) => {
                studentSelectOptionsElm +=
                    `<option value='${student.id}'>Name: ${student.name}, Batch: ${student.batch}, Faculty: ${student.faculty.name}, Roll.No: ${student.roll}</option>`
            })
            document.getElementById('students').innerHTML = studentSelectOptionsElm;

            // Fetch library books data
            const resLibraryBooks = await fetch("/api/admin/library/books");
            const libraryBooks = await resLibraryBooks.json();
            let libraryBooksSelectOptionsElm = "<option value='' default>Select Book</option>";
            libraryBooks.forEach((libraryBook) => {
                libraryBooksSelectOptionsElm +=
                    `<option value='${libraryBook.id}'>${libraryBook.book.name}</option>`
            });
            document.getElementById('books').innerHTML = libraryBooksSelectOptionsElm;
        })()
    </script>
@endsection
