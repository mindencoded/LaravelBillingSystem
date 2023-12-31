<ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('messages.index') }}">Messages</a></li>
    <li><a href="{{ route('posts.index') }}">Posts</a></li>
    @guest
        <li><a href="{{ route('login') }}">Login</a></li>
    @else
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('notifies.create') }}">Create Notify</a></li>

        @if ($count = Auth::user()->unreadNotifications()->count())
            <li>
                <a href="{{ route('notifications.index') }}"> Notifications  <span>( {{ $count }} )</span></a>
            </li>
        @endif

        @if (Auth::user()->hasRole('admin'))
            <li><a href="{{ route('users.index') }}">Users</a></li>
        @endif
        <li>You are logged as [{{ Auth::user()->email }}]</li>
        <li><a href="{{ route('users.edit', Auth::user()->id) }}">My Account</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="javascript:void(0)" onclick="this.closest('form').submit()">Logout</a>
            </form>
        </li>
    @endguest

</ul>
