@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
@endsection

@section('style')
    @parent
@endsection

@section('title', 'Dashboard')
<h1>Hello {{ $user['name'] }}</h1>
@section('main')

@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
