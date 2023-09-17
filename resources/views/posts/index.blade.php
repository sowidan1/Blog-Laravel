@extends('layouts.app2')

@section('content')
    <center><a id="a2" href="{{ route('posts.create') }}">create post</a></center>
    <center>
        <table style="width: 100%;">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Posted by</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->posted_by }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at->toFormattedDateString() }}</td>
                    <td>

                        <div style="display: flex; gap: 10px;">
                            <a class='btn btn-info'href="{{ route('posts.show', ['post' => $post['id']]) }}">View</a>
                            <a class='btn btn-primary'href="{{ route('posts.edit', ['post' => $post['id']]) }}">Edit</a>
                            <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="POST"
                                id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                            </form>

                            <div class="custom-alert" id="deleteAlert">
                                <div class="alert-content">
                                    <p>Are you sure you want to delete this row?</p>
                                    <button class="btn btn-secondary" id="cancelButton">Cancel</button>
                                    <button class="btn btn-danger" id="confirmButton">Delete</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </center>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');
            const deleteAlert = document.getElementById('deleteAlert');
            const cancelButton = document.getElementById('cancelButton');
            const confirmButton = document.getElementById('confirmButton');
            const deleteForm = document.getElementById('deleteForm');

            deleteButton.addEventListener('click', function() {
                deleteAlert.style.display = 'block';
            });

            cancelButton.addEventListener('click', function() {
                deleteAlert.style.display = 'none';
            });

            confirmButton.addEventListener('click', function() {
                deleteForm.submit();
            });
        });
    </script>
@endsection
