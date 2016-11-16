@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create post</div>
                    <div class="panel-body">
                        <form method="post" action="/posts">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p>Title</p>
                                <label class="sr-only" for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <p>Excerpt</p>
                                <label class="sr-only" for="excerpt">Excerpt</label>
                                <textarea class="form-control" id="excerpt" rows="2" name="excerpt"></textarea>
                            </div>
                            <div class="form-group">
                                <p>Body</p>
                                <label class="sr-only" for="body">Body</label>
                                <textarea class="form-control" id="body" rows="4" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection