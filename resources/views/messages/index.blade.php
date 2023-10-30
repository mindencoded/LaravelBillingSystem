@extends('layouts.main_layout')
@section('content')
    <h1>Messages</h1>
    @include('partials._notifications')
    <form action="{{ route('messages.create') }}" method="GET">
        <button type="submit" style="cursor: pointer;">Create Message</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Note</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->userName() }}</td>
                <td>{{ $message->userEmail() }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->note ? $message->note->body : '' }}</td>
                <td>
                    {{ $message->tags->pluck('name')->implode(', ') }}
                </td>
                <td>
                    <form action="{{ route('messages.edit', $message->id) }}" method="GET"
                          style="display: inline;">
                        <button type="submit" style="cursor: pointer;">Edit</button>
                    </form>
                    |
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center">No messages</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $messages->fragment('hash')->appends(request()->query())->links() }}
@endsection
