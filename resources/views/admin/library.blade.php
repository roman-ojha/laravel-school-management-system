@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
@endsection

@section('style')

@endsection

@section('title', 'library')

@section('main')
    <h1>Library</h1>
    <a class="admin-anchor" href="{{ route('admin-students') }}">Students</a>
    <a class="admin-anchor" href="{{ route('admin-teachers') }}">Teachers</a>
    <a class="admin-anchor" href="{{ route('admin-books') }}">Books</a>
    <a class="admin-anchor" href="{{ route('admin-faculties') }}">Faculties</a>
    <a class="admin-anchor" href="{{ route('admin-subjects') }}">Subjects</a>
    <a class="admin-anchor" href="{{ route('admin-library-book_self') }}">Library</a>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
