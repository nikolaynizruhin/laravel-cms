@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @forelse ($posts as $post)

                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>{{ $post->title }}</h4></div>

                        <div class="panel-body">
                            {!! $post->excerpt !!}
                            <p>
                                <a href="{{ url('/posts/' . $post->id) }}"><small>Read more...</small></a>
                            </p>
                        </div>
                    </div>

                @empty

                    <h4>No posts</h4>

                @endforelse

                    {{ $posts->links() }}

            </div>
        </div>
    </div>
@endsection