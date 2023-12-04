@extends('layouts.main_layout')

@section('content')
    <h1>Edit User</h1>
    @include('partials._notifications')
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <img style="width: 100px;" src="{{ Storage::url($user->avatar) }}" />
        <br>
        <br>
        @include('admin.users.partials._user_form')
    </form>
@endsection
