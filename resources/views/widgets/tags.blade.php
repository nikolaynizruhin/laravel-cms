<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tags</h4>
    </div>

    <div class="panel-body">
        @forelse ($tags as $tag)
            <a class="btn btn-default btn-xs" href="{{ url('/tags/' . $tag->id) }}" role="button">
                {{ $tag->name }}
            </a>
        @empty
            <p>No tags</p>
        @endforelse
    </div>
</div>