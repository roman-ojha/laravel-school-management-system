@extends('layout.global')

@section('css')
    @vite('resources/css/admin/students.css')
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

@section('title', 'admin')

@section('main')
    <h1>Students</h1>
    <div class="add-button">
        <a href="{{ route('add-student-view') }}">Add new Student</a>
    </div>
    <div id="students-list-component">
        <x-students-list :students="$students" />
    </div>
    @include('layout.navigate-to-admin')
@endsection

@section('script')
    <script type="text/javascript">
        async function deleteStudent(id) {
            // delete according to given id
            const res = await fetch(`/student/${id}`, {
                method: "GET",
            });

            const resHtml = await res.text();
            const studentsListComponent = document.getElementById(
                "students-list-component"
            );
            studentsListComponent.innerHTML = resHtml;
        }
    </script>
@endsection
