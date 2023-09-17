@extends('layouts.app2')
@extends('layouts.createStyle')
@section('alert')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif



    <style>
        .alert-danger {
            width: 850px;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
            display: flex;
            align-items: center;
            margin-left: 24%;
        }
    </style>
@endsection
@section('content')
    <center>
        <form class="form" method="post" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputEmail3" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputEmail3" value="{{ $post->title }}" name="title">
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="form-label">Posted by</label>
                {{-- <input type="text" class="form-control" id="inputEmail3" name="posted_by"> --}}
                <select class="form-control" name="posted_by" id="inputEmail3">
                    @foreach ($users as $user)
                        <option {{-- value="{{$user->id}}" --}}>{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <input style="height:80px;" class="form-control" id="exampleFormControlTextarea1"
                    value="{{ $post->description }}" name="description">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </center>
@endsection
