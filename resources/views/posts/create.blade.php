@extends('layouts.main_layout')

@section('content')
    <h1>New Post</h1>
    @include('partials._notifications')
    <form id="post_form" action="{{ route('posts.store') }}" method="POST">
        @method('POST')
        @include('posts.partials._post_form')
    </form>
@endsection
