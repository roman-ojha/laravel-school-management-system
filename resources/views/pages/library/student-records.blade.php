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
    <div id="student-record-list-component">
        <x-library.student-records :libraryStudents="$library_students" />
    </div>
    @include('layout.navigate-to-admin')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
    <script type="text/javascript">
        async function deleteStudentRecord(student_library_id) {
            const res = await fetch(`/library/students-record?student_library_id=${student_library_id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                }
            });
            const resText = await res.text();
            document.getElementById('student-record-list-component').innerHTML = resText;
        }
    </script>
@endsection
