@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ url('/users/' . $post->user->id) }}">
                                    <img class="media-object img-circle" src="{{ url('/uploads/avatars/' . $post->user->avatar) }}" height="32" width="32" alt="avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <a href="{{ url('/users/' . $post->user->id) }}">{{ $post->user->name }}</a><br>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </h5>
                            </div>
                        </div>
                        <h4>{{ $post->title }}</h4>
                    </div>

                    <div class="panel-body">
                        {!! $post->body !!}
                        <hr>
                        @include ('tags.list')
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Comments</h4></div>

                    <div class="panel-body">

                        @if (isset($comments['root']))
                            @include ('comments.list', ['collection' => $comments['root']])
                        @else
                            <p>NO COMMENTS</p>
                        @endif
                            <br>
                        @if (Auth::check())
                            @include ('comments.form')
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                @include ('widgets.categories')

                @include('widgets.tags', ['tags' => $tagsAll])
            </div>
        </div>
    </div>
@endsection