<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Categories</h4>
    </div>

    <div class="panel-body">
        @forelse ($categories as $category)
            <p>
                <a href="{{ url('/categories/' . $category->id) }}">
                    {{ $category->name }}
                </a>
            </p>
        @empty
            <p>No categories</p>
        @endforelse
    </div>
</div>