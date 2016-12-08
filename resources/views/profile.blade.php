@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->name }}`s Profile</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ url('/uploads/avatars/' . Auth::user()->avatar) }}" alt="avatar" class="img-circle">
                            </div>

                            <div class="col-md-9">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Join: </strong> {{ Auth::user()->created_at->toFormattedDateString() }}</p>
                                <form enctype="multipart/form-data" method="POST" action="/profile">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="file">Update Profile Image</label>
                                        <input type="file" name="avatar" id="file">
                                    </div>
                                    <button type="submit" class="pull-right btn btn-default btn-sm">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
