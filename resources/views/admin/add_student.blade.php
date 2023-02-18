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

        .students-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .students-button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('title', 'add new student')

@section('main')
    <h1>Add new Student</h1>
    <form action="{{ route('admin-add-student') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="roll">Roll</label>
            <input type="number" id="roll" name="roll">
        </div>
        <div>
            <label for="batch">Batch</label>
            <input type="date" id="batch" name="batch">
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    {{-- @if ($error)
        <h1>Error</h1>
    @endif --}}
    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="students-button">
        <a href="{{ route('admin-students') }}">Show Students</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
