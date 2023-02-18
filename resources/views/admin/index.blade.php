@extends('layout.global')

@section('css')
    @vite('resources/css/admin/index.css')
@endsection

@section('title', 'admin')

@section('main')
    <h1>Admin</h1>

    <a href="{{ route('admin-students') }}">Students</a>
    <a href="{{ route('admin-teachers') }}">Teachers</a>
    <a href="{{ route('admin-books') }}">Books</a>
@endsection

@section('script')
@endsection
