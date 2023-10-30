@extends('layouts.main_layout')

@section('content')
    <h1>Users</h1>
    @include('partials._notifications')
    <form action="{{ route('users.create') }}" method="GET">
        <button type="submit" style="cursor: pointer;">Create User</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Note</th>
                <th>Tags</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->present()->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->note ? $user->note->body : '' }}</td>
                    <td>
                        {{ $user->tags->pluck('name')->implode(', ') }}
                    </td>
                    <td>
                        {{ $user->roles->pluck('name')->implode(', ') }}
                    </td>
                    <td>
                        <form action="{{ route('users.edit', $user->id) }}" method="GET" style="display: inline;">
                            <button type="submit" style="cursor: pointer;">Edit</button>
                        </form>
                        |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center">No Users</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
