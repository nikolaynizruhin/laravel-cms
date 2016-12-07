@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include ('partials.posts')

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-2">

            @include ('partials.categories')

        </div>
        <div class="col-md-4">

            @include ('partials.tags')

        </div>
    </div>
</div>
@endsection
