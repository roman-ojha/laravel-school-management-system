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

@section('title', 'book-self')

@section('main')
    <h1>Book Self</h1>
    <div class="add-button">
        <a href="{{ route('add-book-into-book-self') }}">Add Book into Bookself</a>
    </div>
    <div id="book-self-list-component">
        <x-book-self-book-list :bookSelf="$book_self" />
    </div>
    @include('layout.navigate-to-admin')
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript">
        async function deleteBook(id) {
            const res = await fetch(`/library/book-self/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                }
            });
            const resText = await res.text();
            document.getElementById('book-self-list-component').innerHTML = resText;
        }
    </script>
@endsection
