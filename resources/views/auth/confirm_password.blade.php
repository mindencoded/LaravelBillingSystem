@extends('layouts.main_layout')
@section('title')
    Confirm Password
@endsection
@section('content')
    <h1>Confirm Password</h1>
    <form action="/confirm-password" method="POST">
        @csrf
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="" required autofocus>
        @error('password')
            <br>
            {{ $message }}
        @enderror
        <br>
        <button type="submut"> Submit </button>
    </form>
@endsection
