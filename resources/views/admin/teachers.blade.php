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

@section('title', 'teachers')

@section('main')
    <h1>Teachers</h1>
    <div class="add-button">
        <a href="{{ route('admin-view-add-teacher') }}">Add new teacher</a>
    </div>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Salary</th>
            <th>Delete</th>
        </tr>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher['name'] }}</td>
                <td>{{ $teacher['salary'] }}</td>
                <td>
                    <button class="delete-button" onclick="deleteTeacher({{ $teacher['id'] }})"
                        data-id="{{ $teacher['id'] }}">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script>
        function deleteTeacher(id) {
            console.log(id);
        }
    </script>
@endsection
