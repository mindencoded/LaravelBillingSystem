@extends('layouts.main_layout')

@section('content')
    <h1>Create User</h1>
    @include('partials._notifications')
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @include('admin.users.partials._user_form')
    </form>
@endsection
