@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include ('partials.posts')

            @include ('partials.categories')

            @include ('partials.tags')

        </div>
    </div>
</div>
@endsection
