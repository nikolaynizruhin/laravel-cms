<br>
<a class="btn btn-success btn-sm pull-right" href="{{ url('/posts/create') }}" role="button">Add</a>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    @forelse ($posts as $post)
        <tr>
            <td>
                {{ $post->id }}
            </td>
            <td>
                {{ $post->title }}
            </td>
            <td>
                {{ $post->created_at }}
            </td>
            <td>
                {{ $post->updated_at }}
            </td>
            <td>
                <a class="btn btn-primary btn-xs" href="{{ url('/posts/' . $post->id . '/edit') }}" role="button">Edit</a>
            </td>
            <td>
                <form action="{{ url('/posts/' . $post->id) }}" method="POST">

                    {{ method_field('DELETE') }}

                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <p>No posts</p>
    @endforelse
</table>