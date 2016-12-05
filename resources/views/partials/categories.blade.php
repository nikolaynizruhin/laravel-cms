<div class="panel panel-default">
    <div class="panel-heading">Categories</div>

    <div class="panel-body">
        <form class="form-inline" method="POST" action="{{ url('/categories') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="sr-only" for="category">Tag</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control input-sm" id="category" placeholder="Category name">

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
                <th>Created</th>
                <th>Delete</th>
            </tr>
            </thead>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->created_at }}
                    </td>
                    <td>
                        <form action="{{ url('/categories/' . $category->id) }}" method="POST">

                            {{ method_field('DELETE') }}

                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>No categories</p>
            @endforelse
        </table>
    </div>
</div>