@extends('admin.layouts.main_layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <h1>Dashboard</h1>
    @if (session('login_status'))
        {{ session('login_status') }}
    @endif
@endsection
