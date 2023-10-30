@csrf
@if ($showFields)
    <p>
        <label for="name">
            Name:
            <br>
            <input type="text" name="name" value="{{ $message->name }}">
            <br>
            {!! $errors->first('name', '<span style="color: red">:message</span>') !!}
        </label>
    </p>
    <p>
        <label for="email">
            Email:
            <br>
            <input type="email" name="email" value="{{ $message->email }}">
            <br>
            {!! $errors->first('email', '<span style="color: red">:message</span>') !!}
        </label>
    </p>
@endif
<p>
    <label for="message">
        Message:
        <br>
        <textarea name="message" cols="30" rows="10">{{ $message->message }}</textarea>
        <br>
        {!! $errors->first('message', '<span style="color: red">:message</span>') !!}
    </label>
</p>
<p>
    <button type="submit" id='message_form__submit_button'>Submit</button>
</p>
