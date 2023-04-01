@extends('layout.app')

@section('title') Index @endsection

@section('content')
<div class="mt-3 text-center">
    <a name="create-post" id="create-post" class="btn btn-success" href="#" role="button">Create Post</a>
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
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['posted_by'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    <a name="btn-view" id="btn-view" class="btn btn-success" href="/posts/{{ $post['id'] }}" role="button">View</a>
                    <a name="btn-edit" id="btn-edit" class="btn btn-primary" href="/posts/{{ $post['id'] }}" role="button">Edit</a>
                    <a name="btn-delete" id="btn-delete" class="btn btn-danger" href="/posts/{{ $post['id'] }}" role="button">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
