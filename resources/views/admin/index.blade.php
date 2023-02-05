@extends('layout.global')

@section('css')
    @vite('resources/css/admin/index.css')
@endsection

@section('title', 'admin')

@section('main')
    <h1>Admin</h1>

    <a href="{{ route('admin-students') }}">Student</a>
@endsection

@section('script')
@endsection
