@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @forelse ($posts as $post)

                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $post->title }}</div>

                        <div class="panel-body">
                            {{ $post->excerpt }}
                        </div>
                    </div>

                @empty

                    <h4>No posts</h4>

                @endforelse

            </div>
        </div>
    </div>
@endsection