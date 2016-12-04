@foreach ($tags as $tag)
    <a class="btn btn-default btn-xs" href="{{ url('/tags/' . $tag->id) }}" role="button">
        {{ $tag->name }}
    </a>
@endforeach