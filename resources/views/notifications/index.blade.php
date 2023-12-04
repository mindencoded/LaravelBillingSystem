@extends('layouts.main_layout')
@section('title')
    Notifications Index
@endsection
@section('content')
    <h1>Notifications Index</h1>
    <h3>Unread notifications:</h3>
    @include('partials._notifications')
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Body</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($unreadNotifications as $unreadNotification)
            <tr>
                <td>{{ $unreadNotification->data['id'] }}</td>
                <td><a href="{{ $unreadNotification->data['link'] }}">
                        {!! $unreadNotification->data['text'] !!}
                    </a>
                </td>
                <td>
                    <form action="{{ route('notifications.read', $unreadNotification->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="cursor: pointer;">Read</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center">No unread notification</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <h3>Read notifications:</h3>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Body</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($readNotifications as $readNotification)
            <tr>
                <td>{{ $readNotification->data['id'] }}</td>
                <td><a href="{{ $readNotification->data['link'] }}">
                        {!! $readNotification->data['text'] !!}
                    </a>
                </td>
                <td>
                    <form action="{{ route('notifications.destroy', $readNotification->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center">No read notification</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
