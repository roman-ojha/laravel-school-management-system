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
    <h1>Add new Book Into BookSelf</h1>
    <form action="{{ route('add-book-int-book-self') }}" method="POST">
        @csrf
        <div>
            <label for="book">Book</label>
            <select name="book" id="book"></select>
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity">
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="books-button">
        <a href="{{ route('book-self') }}">Show BookSelf</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript">
        (async function() {
            const booksRes = await fetch('/api/library/books-for-book-self');
            const books = await booksRes.json();
            let booksOption = "<option value='' disabled> Select Book </option>";
            books.forEach((value) => {
                booksOption += `
                <option value="${value.id}"> ${value.name} </option>
                `;
            });
            document.getElementById('book').innerHTML = booksOption;
            if (books.length == 0) {
                document.body.innerHTML =
                    "<h1> All the books are added into the library, Please first add new books only after that you can add it into the library </h1>"
            }
        })();
    </script>
@endsection
