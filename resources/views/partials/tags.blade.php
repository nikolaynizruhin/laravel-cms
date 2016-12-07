<div class="panel panel-default">
    <div class="panel-heading">Tags</div>

    <div class="panel-body">
        <form class="form-inline" method="POST" action="{{ url('/tags') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="sr-only" for="tag">Tag</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control input-sm" id="tag" placeholder="Tag name">

                @if ($errors->has('name'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-success btn-sm">Add</button>
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
            </thead>
            @forelse ($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->id }}
                    </td>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        <form action="{{ url('/tags/' . $tag->id) }}" method="POST">

                            {{ method_field('DELETE') }}

                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>No tags</p>
            @endforelse
        </table>
    </div>
</div>