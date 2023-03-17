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

        .subject-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .subject-button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('title', 'add new subject')

@section('main')
    <h1>Add new Subject</h1>
    <form action="{{ route('add-subject') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="subject-button">
        <a href="{{ route('subjects') }}">Show Subject</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
