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

        .books-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .books-button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('title', 'add new book')

@section('main')
    <h1>Add new Book</h1>
    <form action="{{ route('admin-add-book') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="publication">Publication</label>
            <input type="text" id="publication" name="publication">
        </div>
        <div>
            <label for="page">No. of page</label>
            <input type="number" id="page" name="page">
        </div>
        <div>
            <label for="released_on">Released On</label>
            <input type="date" id="released_on" name="released_on">
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="books-button">
        <a href="{{ route('admin-books') }}">Show Books</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
