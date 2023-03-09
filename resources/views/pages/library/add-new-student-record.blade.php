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
    <h1>Library: Add new student record</h1>
    <form action="">
        @csrf
        <div>
            <label for="student">Select Student</label>
            <select name="student" id="student">
            </select>
        </div>
        <div>
            <label for="book">Select Book</label>
            <select name="book" id="book">
                <option value="" default>Select Book</option>
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
@endsection
