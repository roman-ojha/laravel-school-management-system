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

        .students-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .students-button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('title', 'add new student')

@section('main')
    <h1>Add new Student</h1>
    <form action="{{ route('add-student') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" />
            @if ($errors->has('name'))
                <p class="error">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" id="email" />
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div>
            <label for="roll">Roll</label>
            <input type="number" id="roll" name="roll" placeholder="Enter Roll No.">
            @if ($errors->has('roll'))
                <p class="error">{{ $errors->first('roll') }}</p>
            @endif
        </div>
        <div>
            <label for="batch">Batch</label>
            <input type="date" id="batch" name="batch">
            @if ($errors->has('batch'))
                <p class="error">{{ $errors->first('batch') }}</p>
            @endif
        </div>
        <div>
            <label for="faculty">Faculty</label>
            <select name="faculty" id="faculty">
                {{-- options --}}
            </select>
            @if ($errors->has('faculty'))
                <p class="error">{{ $errors->first('faculty') }}</p>
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
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" />
            @if ($errors->has('password_confirmation'))
                <p class="error">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    {{-- @if ($error)
        <h1>Error</h1>
    @endif --}}
    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="students-button">
        <a href="{{ route('students') }}">Show Students</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript">
        (async function() {
            const res = await fetch("/api/faculties");
            const faculties = await res.json();
            let facultiesOptions = "<option value='' disabled>Select Faculty</option>";
            faculties.forEach((faculty) => {
                facultiesOptions += ` 
                    <option value="${faculty.id}">${faculty.name}</option>
                `
            })
            document.getElementById('faculty').innerHTML = facultiesOptions;
        })()
    </script>
@endsection
