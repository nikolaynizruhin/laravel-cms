<ul class="media-list">
    @foreach ($collection as $comment)
        @include ('comments.comment')
    @endforeach
</ul>