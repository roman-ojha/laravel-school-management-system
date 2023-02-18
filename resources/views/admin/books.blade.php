@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
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

@section('title', 'books')

@section('main')
    <h1>Books</h1>
    <div class="add-button">
        <a href="{{ route('admin-view-add-student') }}">Add new Books</a>
    </div>
    <div id="books-list-component">
        <x-books-list :books="$books" />
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
