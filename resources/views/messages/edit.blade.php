@extends('layouts.main_layout')

@section('content')
    <h1>Edit Message</h1>
    @include('partials._notifications')
    <form id="message_form" action="{{ route('messages.update', $message->id) }}" method="POST">
        @method('PUT')
        @include('messages.partials._message_form', [
            'showFields' => !$message->user_id,
        ])
    </form>
@endsection
