<li class="media">
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->name }} said...</h4>
        <p>{{ $comment->body }}</p>
    </div>

    @if (Auth::check())
        @include ('comments.form', ['parentId' => $comment->id])
    @endif

    @if (isset($comments[$comment->id]))
        @include ('comments.list', ['collection' => $comments[$comment->id]])
    @endif
</li>