@extends('layouts.app2')

@section('content')
    <center>
        <div class="card">
            <div class="card-header"> post details </div>
            <div class="card-body">

                <h5 class="card-title">Title <br> {{ $post['title'] }}</h5>
                <h5 class="card-title">Posted by <br> {{ $post['posted_by'] }}</h5>
                <h5 class="card-title">Description <br> {{ $post['description'] }}</h5>
                <h5 class="card-title">Created at <br> {{ $post['created_at']->toDayDateTimeString() }}</h5>
            </div>
        </div>
    </center>
@endsection
