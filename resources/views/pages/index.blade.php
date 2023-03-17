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

        #profile {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #profile p,
        #profile li {
            font-size: 20px;
            margin: 10px;
            padding: 0px;
        }

        #profile h3 {
            font-size: 30px;
            margin: 10px;
            padding: 0px;
        }
    </style>
@endsection

@section('title', 'Dashboard')
<nav>
    <div>
        <h1>Hello {{ $user['user']['name'] }}</h1>
    </div>
    <div>
        <div>
            <a href="">Library book self</a>
        </div>
        <div>
            <a href="">Profile</a>
        </div>
        <div>
            <a href="{{ route('logout') }}">Log Out</a>
        </div>
    </div>
</nav>
<main>
    <div id="profile">
        <p>Name: {{ $user['user']['name'] }}</p>
        <p>Email: {{ $user['user']['email'] }}</p>
        <p>Roll No.: {{ $user['roll'] }}</p>
        <p>Batch: {{ $user['batch'] }}</p>
        <p>Faculty: {{ $user['faculty']['name'] }}</p>
        <h3>Books that you borrowed:</h3>
        <ul>
            @foreach ($user['library'] as $library)
                <li>{{ $library['book']['name'] }}</li>
            @endforeach
        </ul>
    </div>
</main>
@section('main')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
