@extends('layouts.main_layout')

@section('content')
    <h1>Notification</h1>
    <p>
        <strong>Body:</strong> {{ $notify->body }}
    </p>
    <small><strong>Sender by </strong> <a href="{{ route('users.show', $notify->sender->id  ) }}">{{ $notify->sender->name }}</a> </small>
@endsection
