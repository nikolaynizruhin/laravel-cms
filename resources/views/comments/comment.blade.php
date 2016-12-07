<div class="media">
    <div class="media-left">
        <a href="{{ url('/users/' . $comment->owner->id) }}">
            <img class="media-object img-thumbnail" width="64" height="64" src="{{ url('/uploads/avatars/' . $comment->owner->avatar) }}" alt="avatar">
        </a>
    </div>
    <div class="media-body">
        <h5 class="media-heading">
            <a href="{{ url('/users/' . $comment->owner->id) }}">{{ $comment->owner->name }}</a> said...
        </h5>

        {{ $comment->body }}

        @if (Auth::check())
            @include ('comments.form', ['parentId' => $comment->id])
        @endif

        @if (isset($comments[$comment->id]))
            @include ('comments.list', ['collection' => $comments[$comment->id]])
        @endif
    </div>
</div>