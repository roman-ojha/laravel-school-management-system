@extends('layout.global')

@section('css')
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

@section('title', 'teachers')

@section('main')
    <h1>Book Self</h1>
    <div class="add-button">
        <a href="{{ route('admin-add-book-into-book-self') }}">Add Book into Bookself</a>
    </div>
    <div id="book-self-list-component">
        <x-book-self-book-list :bookSelf="$book_self" />
        {{-- <x-teachers-list :teachers="$teachers" /> --}}
    </div>
    @include('layout.navigate-to-admin')
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript"></script>
@endsection
