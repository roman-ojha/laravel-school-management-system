@extends('layout.global')

@section('css')
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
    <h1>Subjects</h1>
    <div class="add-button">
        <a href="{{ route('add-subject-view') }}">Add new Subject</a>
    </div>
    <div id="subjects-list-component">
        <x-subjects-list :subjects="$subjects" />
    </div>
    @include('layout.navigate-to-admin')
@endsection

@section('script')
    <script type="text/javascript">
        async function deleteSubject(id) {
            try {
                const res = await fetch(`/subject/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    }
                });
                const resHtml = await res.text();
                document.getElementById('subjects-list-component').innerHTML = resHtml;
            } catch (err) {

            }
        }
    </script>
@endsection
