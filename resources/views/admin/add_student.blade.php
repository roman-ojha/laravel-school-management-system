@extends('layout.global')

@section('css')
    {{-- @vite('resources/css/') --}}
@endsection

@section('style')
@endsection

@section('title', 'admin')

@section('main')
    <h1>Add new Student</h1>
    <form action="" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="roll">Roll</label>
            <input type="number" id="roll" name="roll">
        </div>
        <div>
            <label for="batch">Batch</label>
            <input type="date" id="batch" name="batch">
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>
@endsection

@section('script')
    {{-- @vite('resources/js/') --}}
@endsection
