@extends('layout.app')

@section('title')
    Index
@endsection

@section('content')
        <div class="mt-4 text-center">
            <a name="create-post" id="create-post" class="btn btn-success" href="{{ route('posts.create') }}" role="button">Create
                Post</a>
        </div>
        <div class="table-responsive mt-4">
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <a name="btn-view" id="btn-view" class="btn btn-success" href="/posts/{{ $post['id'] }}"
                                    role="button">View</a>
                                <a name="btn-edit" id="btn-edit" class="btn btn-primary" href="/posts/{{ $post['id'] }}/edit"
                                    role="button">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $post->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete post <span id="post-id"></span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="POST" id='delete-form'>
                                                    @csrf
                                                    @method('DELETE')
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $posts->links() }}
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let id;
        $(document).ready(function() {
            $('button[data-bs-target="#exampleModal"]').on('click', function() {
                id = $(this).get(0).dataset['id'];
                $('#post-id').text(id);
                $('#delete-form').attr('action', '/posts/' + id);
            });
        });
    </script>
@endsection
