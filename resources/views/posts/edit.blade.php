@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create post</div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/posts/' . $post->id) }}">

                            {{ method_field('PUT') }}

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title</label>

                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id">Category</label>

                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($post->category->id == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                                <label for="excerpt">Excerpt</label>

                                <textarea class="form-control" id="excerpt" rows="2" name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</textarea>

                                @if ($errors->has('excerpt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('excerpt') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body">Body</label>

                                <textarea class="form-control" id="body" rows="5" name="body" required>{{ old('body', $post->body) }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="tags">Tags</label>

                                <select multiple="multiple" name="tags[]" class="form-control">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" @if(in_array($tag->id, $post->tags()->pluck('id')->all())) selected @endif>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="{{ url('/posts/' . $post->id) }}" method="POST">

                            {{ method_field('DELETE') }}

                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection