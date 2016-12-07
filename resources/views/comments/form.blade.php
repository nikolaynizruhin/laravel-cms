<form method="POST" action="/posts/{{ $post->id }}/comments">
    {{ csrf_field() }}

    @if (isset($parentId))
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
    @endif

    <div class="form-group">
        <textarea class="form-control" rows="2" name="body" placeholder="Leave a reply..." required></textarea>
    </div>

    <button type="submit" class="btn btn-default btn-sm">Reply</button>
</form>