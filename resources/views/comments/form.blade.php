<form method="POST" action="/posts/{{ $post->id }}/comments">
    {{ csrf_field() }}

    @if (isset($parentId))
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
    @endif

    <textarea name="body" required></textarea>

    <button type="submit">Reply</button>
</form>