<div class="media">
    <div class="media-left">
        <a href="{{ url('/users/' . $comment->owner->id) }}">
            <img class="media-object img-thumbnail" width="64" height="64" src="{{ url('/uploads/avatars/' . $comment->owner->avatar) }}" alt="avatar">
        </a>
    </div>
    <div class="media-body">
        <h5 class="media-heading">
            <a href="{{ url('/users/' . $comment->owner->id) }}">{{ $comment->owner->name }}</a>
            @if ($comment->parent_id)
                <i class="fa fa-share" aria-hidden="true"></i>
                <a href="{{ url('/users/' . App\Comment::find($comment->parent_id)->owner->id) }}" style="color: inherit">
                    {{ App\Comment::find($comment->parent_id)->owner->name }}
                </a>
            @endif
            &bull; {{ $comment->created_at->diffForHumans() }}
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