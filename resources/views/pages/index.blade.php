@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
@endsection

@section('style')
    {{-- @parent --}}
    <style>
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 10px;
            background-color: aqua;
            padding: 5px 0px;
        }

        nav div {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        nav div div {
            margin: 10px 20px;
        }

        nav div div a {
            text-decoration: none;
            color: black;
            padding: 5px 10px;
            background-color: green;
            border-radius: 5px;
            font-size: 20px;
        }

        nav div h1 {
            margin-left: 30px;
        }
    </style>
@endsection

@section('title', 'Dashboard')
<nav>
    <div>
        <h1>Hello {{ $user['name'] }}</h1>
    </div>
    <div>
        <div>
            <a href="">Library book self</a>
        </div>
        <div>
            <a href="">Book you borrowed</a>
        </div>
        <div>
            <a href="{{ route('logout') }}">Log Out</a>
        </div>
    </div>
</nav>
@section('main')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
