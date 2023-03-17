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

@section('title', 'register')

@section('main')
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" placeholder="Enter Name" name="name" id="name" />
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" id="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" />
        </div>
        <div>
            <label for="c_password">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="c_password" id="c_password" />
        </div>
        <div>
            <input type="submit" id="register" name="register" value="register" />
        </div>
    </form>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
