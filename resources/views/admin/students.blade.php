@extends('layout.global')

@section('css')
    @vite('resources/css/admin/students.css')
@endsection

@section('title', 'admin')

@section('main')
    <h1>Students</h1>
    <div>
        <a href="{{ route('admin.add.student') }}">Add new Student</a>
    </div>
@endsection

@section('script')
@endsection
