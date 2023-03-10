@extends('layout.global')

@section('css')
    @vite('resources/css/admin/index.css')
@endsection

@section('title', 'admin')

@section('main')
    <h1>Admin</h1>

    <a class="admin-anchor" href="{{ route('admin-students') }}">Students</a>
    <a class="admin-anchor" href="{{ route('admin-teachers') }}">Teachers</a>
    <a class="admin-anchor" href="{{ route('admin-books') }}">Books</a>
    <a class="admin-anchor" href="{{ route('admin-faculties') }}">Faculties</a>
    <a class="admin-anchor" href="{{ route('admin-subjects') }}">Subjects</a>
    <a class="admin-anchor" href="{{ route('library-view') }}">Library</a>
@endsection

@section('script')
@endsection
