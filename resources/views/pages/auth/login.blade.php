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
    </style>
@endsection

@section('title', 'Login')

@section('main')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" id="email"
                @if (Session::has('email')) value="{{ Session::get('email') }}" @endif />
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" />
            @if ($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <div>
            <input type="submit" id="login" name="login" value="login" />
        </div>
    </form>
    @if (Session::has('error'))
        <p class="error">{{ Session::get('error') }}</p>
    @endif
    {{-- <p>Doesn't have account? <a href="{{ route('register') }}">create here</a></p> --}}
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
