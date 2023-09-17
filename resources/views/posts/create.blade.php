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

        <form class="form" method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="inputEmail3" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputEmail3" name="title">
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="form-label">Posted by</label>
                <select class="form-control" name="posted_by" id="inputEmail3">
                    @foreach ($users as $user)
                        <option>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </center>
@endsection

