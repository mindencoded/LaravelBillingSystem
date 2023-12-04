@csrf

<p>
    <label for="title">
        Title:
        <br>
        <input type="text" name="title" value="{{ $post->title }}">
        <br>
        {!! $errors->first('title', '<span style="color: red">:message</span>') !!}
    </label>
</p>
<p>
    <label for="body">
        Body:
        <br>
        <textarea name="body" cols="30" rows="10">{{ $post->body }}</textarea>
        <br>
        {!! $errors->first('body', '<span style="color: red">:message</span>') !!}
    </label>
</p>
<p>
    <button type="submit" id='post_form__submit_button'>Submit</button>
</p>
