@extends('layout.app')

@section('title') Index @endsection

@section('content')
<div class="mt-3 text-center">
    <a name="create-post" id="create-post" class="btn btn-success" href="{{ route('posts.create') }}" role="button">Create Post</a>
</div>
<div class="table-responsive mt-3">
    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                <td>
                    <a name="btn-view" id="btn-view" class="btn btn-success" href="/posts/{{ $post['id'] }}" role="button">View</a>
                    <a name="btn-edit" id="btn-edit" class="btn btn-primary" href="/posts/{{ $post['id'] }}/edit" role="button">Edit</a>
                    <a name="btn-delete" id="btn-delete" class="btn btn-danger" href="/posts/{{ $post['id'] }}/delete" role="button">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
