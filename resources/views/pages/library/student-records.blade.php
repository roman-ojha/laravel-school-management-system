@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
    @vite('resources/css/admin/index.css')
@endsection

@section('style')
    @parent
    <style>
        .add-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .add-button a {
            text-decoration: none;
            color: black;
        }

        th,
        td {
            padding: 5px 10px;
        }

        .delete-button {
            border-radius: 5px;
            padding: 5px 7px;
            background-color: red;
            color: white;
            border-width: 0px;
            cursor: pointer;
        }
    </style>

@endsection

@section('title', 'library/student-records')

@section('main')
    <h1>Library: Student Records</h1>
    <div class="add-button">
        <a href="{{ route('library-add-new-student-record') }}">Add new Student</a>
    </div>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Borrowed Books</th>
            <th>Delete</th>
        </tr>
    </table>
    @include('layout.navigate-to-admin')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
