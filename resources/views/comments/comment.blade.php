<li>
    <p>{{ $comment->owner->name }} said...</p>

    <p>
        {{ $comment->body }}
    </p>

    @if (Auth::check())
        @include ('comments.form', ['parentId' => $comment->id])
    @endif

    @if (isset($comments[$comment->id]))
        @include ('comments.list', ['collection' => $comments[$comment->id]])
    @endif
</li>