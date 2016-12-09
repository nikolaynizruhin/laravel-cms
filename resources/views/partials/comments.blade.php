<br>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Owner</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Delete</th>
    </tr>
    </thead>
    @forelse ($comments as $comment)
        <tr>
            <td>
                {{ $comment->id }}
            </td>
            <td>
                {{ $comment->owner->name }}
            </td>
            <td>
                {{ $comment->body }}
            </td>
            <td>
                {{ $comment->created_at }}
            </td>
            <td>
                {{ $comment->updated_at }}
            </td>
            <td>
                <form action="{{ url('/comments/' . $comment->id) }}" method="POST">

                    {{ method_field('DELETE') }}

                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <p>No comments</p>
    @endforelse
</table>