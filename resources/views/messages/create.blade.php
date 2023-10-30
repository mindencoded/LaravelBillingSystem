@extends('layouts.main_layout')

@section('content')
    <h1>New Message</h1>
    @include('partials._notifications')
    <form id="message_form" action="{{ route('messages.store') }}" method="POST">
        @method('POST')
        @include('messages.partials._message_form', [
            'message' => new App\Models\Message(),
            'showFields' => auth()->guest(),
        ])
    </form>
@endsection
