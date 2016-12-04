@foreach ($tags as $tag)
    <a class="btn btn-default btn-xs" href="#" role="button">
        {{ $tag->name }}
    </a>
@endforeach