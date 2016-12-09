@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">Posts</a></li>
                <li role="presentation"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab">Categories</a></li>
                <li role="presentation"><a href="#tags" aria-controls="tags" role="tab" data-toggle="tab">Tags</a></li>
                <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="posts">

                    @include ('partials.posts')

                    {{ $posts->links() }}

                </div>
                <div role="tabpanel" class="tab-pane" id="categories">

                    @include ('partials.categories')

                </div>
                <div role="tabpanel" class="tab-pane" id="tags">

                    @include ('partials.tags')

                </div>
                <div role="tabpanel" class="tab-pane" id="comments">

                    @include ('partials.comments')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
