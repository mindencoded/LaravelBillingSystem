@csrf
<label for="name">Name:</label>
<input type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}" autofocus autocomplete>
@error('name')
    <br>
    <span style="color:red;">{{ $message }}</span>
@enderror
<br>
<br>
<label for="email">Email:</label>
<input type="email" name="email" id="email" value="{{ $user->email ?? old('email') }}" autocomplete>
@error('email')
    <br>
    <span style="color:red;">{{ $message }}</span>
@enderror
@unless ($user->id)
    <br>
    <br>
    <label for="name">Password:</label>
    <input type="password" name="password" id="password" value="">
    @error('password')
        <br>
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br>
    <br>
    <label for="name">Password Confirm:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" value="">
    @error('password_confirmation')
        <br>
        <span style="color:red;">{{ $message }}</span>
    @enderror
@endunless
<br>
<br>
Roles:
<ul style="list-style: none;">
    @foreach ($roles as $id => $description)
        <li>
            <input type="checkbox" name="roles[]" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                value="{{ $id }}"> &nbsp;{{ $description }}
        </li>
    @endforeach
</ul>
@error('roles')
    <span style="color:red;">{{ $message }}</span>
    <br>
@enderror
<br>
<button type="submit"> Submit </button>
