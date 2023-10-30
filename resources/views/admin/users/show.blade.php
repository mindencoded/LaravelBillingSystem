@extends('layouts.main_layout')

@section('content')
    <h1>{{ $user->name }}</h1>
    <table class="table" border="1">
        <tr>
            <th>Nombre:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Roles:</th>
            <td>
                @foreach ($user->roles as $key => $role)
                    <span class="user-role">{{ $role->name }}</span>
                @endforeach
            </td>
        </tr>
    </table>
    @can('destroy', $user)
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="cursor: pointer;">Eliminar</button>
        </form>
    @endcan
    |
    @can('edit', $user)
        <form action="{{ route('users.edit', $user->id) }}" method="GET" style="display: inline;">
            @method('GET')
            <button type="submit" style="cursor: pointer;">Edit</button>
        </form>
    @endcan
@endsection
