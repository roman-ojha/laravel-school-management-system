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

@section('title', 'faculties')

@section('main')
    <h1>Faculties</h1>
    <div class="add-button">
        <a href="{{ route('admin-view-add-faculty') }}">Add new Faculty</a>
    </div>
    <div id="faculties-list-component">
        <x-faculties-list :faculties="$faculties" />
    </div>
@endsection

@section('script')
    <script>
        async function deleteFaculty(id) {
            try {
                const res = await fetch(`/admin/faculty/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                });
                const resHtml = await res.text();
                document.getElementById('faculties-list-component').innerHTML = resHtml;
            } catch (err) {

            }
        }
    </script>
@endsection
