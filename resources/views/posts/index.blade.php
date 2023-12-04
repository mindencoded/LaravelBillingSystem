@extends('layouts.main_layout')
@section('content')
    <h1>Posts</h1>
    <form action="{{ route('posts.create') }}" method="GET">
        <button type="submit" style="cursor: pointer;">Create Post</button>
    </form>
    <ul>
        @forelse($posts as $post )
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
        @empty
            <li>No posts found.</li>
        @endforelse
    </ul>
@endsection
