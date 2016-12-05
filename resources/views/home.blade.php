@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts<a class="btn btn-success btn-xs pull-right" href="{{ url('/posts/create') }}" role="button">Add</a></div>

                <div class="panel-body">
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
                </div>
            </div>

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
                            <th>Created</th>
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
                                    {{ $tag->created_at }}
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

        </div>
    </div>
</div>
@endsection
