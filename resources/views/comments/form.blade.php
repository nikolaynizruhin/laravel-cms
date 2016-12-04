<form method="POST" action="/posts/{{ $post->id }}/comments">
    {{ csrf_field() }}

    @if (isset($parentId))
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
    @endif

    <div class="form-group">
        <textarea class="form-control" rows="3" name="body" required></textarea>
    </div>

    <button type="submit" class="btn btn-default">Reply</button>
</form>