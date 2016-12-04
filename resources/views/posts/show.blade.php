@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ $post->title }}
                            <small>by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</small>
                        </h4>
                    </div>

                    <div class="panel-body">
                        {!! $post->body !!}

                        @include ('tags.list')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Comments</h4></div>

                    <div class="panel-body">

                        @if (isset($comments['root']))
                            @include ('comments.list', ['collection' => $comments['root']])
                        @else
                            <p>NO COMMENTS</p>
                        @endif

                        @if (Auth::check())
                            <p>Leave a Reply</p>

                            @include ('comments.form')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection