@extends('layouts.main_layout')
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
@endsection
