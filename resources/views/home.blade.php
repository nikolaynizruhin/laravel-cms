@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            @include ('partials.categories')

        </div>
        <div class="col-md-6">

            @include ('partials.posts')

            {{ $posts->links() }}

        </div>
        <div class="col-md-3">

            @include ('partials.tags')

        </div>
    </div>
</div>
@endsection
