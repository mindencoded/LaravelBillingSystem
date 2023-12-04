@extends('layouts.main_layout')
@section('content')
    <h1>Notes</h1>
    @include('partials._notifications')
    <form action="{{ route('notifies.create') }}" method="GET">
        <button type="submit" style="cursor: pointer;">Create Notify</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notifies as $notify)
                <tr>
                    <td>{{ $notify->id }}</td>
                    <td>{{ $notify->body }}</td>
                    <td>
                        <form action="{{ route('notifies.mark', $notify->id) }}" method="GET" style="display: inline;">
                            <button type="submit" style="cursor: pointer;">Mark as seen</button>
                        </form>
                        |
                        <form action="{{ route('notifies.destroy', $notify->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center">No Notes</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
