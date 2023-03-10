@extends('layout.global')

@section('css')
    @vite('resources/css/admin/index.css')
@endsection

@section('style')

@endsection

@section('title', 'library')

@section('main')
    <h1>Library</h1>
    <a class="admin-anchor" href="{{ route('book-self') }}">Bookself</a>
    <a class="admin-anchor" href="{{ route('library-student-records') }}">Students records</a>
    <a class="admin-anchor" href="">Teachers records</a>
    @include('layout.navigate-to-admin')
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
