@extends('layouts.main_layout')
@section('title')
    Login
@endsection
@section('content')
    <h1>Login</h1>
    @if (session('login_status'))
        {{ session('login_status') }}
        <br>
    @endif
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete>
        @error('email')
            <br>
            {{ $message }}
        @enderror
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="password" required>
        @error('password')
            <br>
            {{ $message }}
        @enderror
        <br>
        <label for="password">Remember Me:</label>
        <input type="checkbox" name="rememberme" id="rememberme">
        <br>
        <button type="submit"> Submit </button>
    </form>
@endsection
