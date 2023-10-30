@extends('layouts.main_layout')

@section('content')
    <h1>Edit User</h1>
    @include('partials._notifications')
    <br>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('PUT')
        @include('admin.users.partials._user_form')
    </form>
@endsection
