@extends('layouts.main_layout')

@section('content')
    <h1>Create a Notify</h1>
    @include('partials._notifications')
    <form id="notify_form" action="{{ route('notifies.store') }}" method="POST">
        @method('POST')
        @csrf
        <select name="recipient_id" id="recipient_id">
            <option value="" selected>-- Seleccione un usuario --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('recipient_id', ' <br><span style="color: red">:message</span>') !!}
        <br><br>
        <textarea name="body" id="body" cols="30" rows="10" placeholder="Write note ..."></textarea>
        {!! $errors->first('body', ' <br><span style="color: red">:message</span>') !!}
        <br><br>
        <button type="submit">Submit</button>
    </form>
@endsection
