@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
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
            margin-bottom: 3px;
        }
    </style>

@endsection

@section('title', 'library/student-records')

@section('main')
    <h1>Library: Student Records</h1>
    <div class="add-button">
        <a href="{{ route('library-add-new-student-record') }}">Add new Student</a>
    </div>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th>Batch</th>
            <th>Faculty</th>
            <th>Borrowed Books</th>
            <th>Delete</th>
        </tr>
        @foreach ($library_students as $library_student)
            <tr>
                <td>{{ $library_student['name'] }}</td>
                <td>{{ $library_student['roll'] }}</td>
                <td>{{ $library_student['batch'] }}</td>
                <td>{{ $library_student['faculty_id'] }}</td>
                <td>
                    @foreach ($library_student['library'] as $lib)
                        <p>{{ $lib['book']['name'] }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach ($library_student['library'] as $lib)
                        <button class="delete-button">Delete</button><br />
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
    @include('layout.navigate-to-admin')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
