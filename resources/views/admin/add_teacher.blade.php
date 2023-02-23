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

        .teachers-button {
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .teachers-button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('title', 'add new teacher')

@section('main')
    <h1>Add Teacher</h1>
    <form action="{{ route('admin-add-teacher') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary">
        </div>
        <div>
            <label for="teaches">Teaches</label>
            <select name="teaches[]" id="teaches" multiple>
                <option value="null">Teacher Teaches</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>

    @if (!empty($error))
        <p class="error">{{ $error }}</p>
    @endif

    <div class="teachers-button">
        <a href="{{ route('admin-teachers') }}">Show Teachers</a>
    </div>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript">
        (async function() {
            const subjectsRes = await fetch("/api/admin/subjects");
            const subjects = await subjectsRes.json();
            var teachesOptions = "";
            subjects.forEach((value, index) => {
                teachesOptions += `
            <option value="${value.id}"> ${value.name} </option>
            `;
            });
            document.getElementById('teaches').innerHTML = teachesOptions;
        })();
    </script>
@endsection
