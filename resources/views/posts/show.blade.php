@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')
    <h2>Post {{ $post->id }} Details</h2>
    @if($post->image)
    <div class="text-center">
        <img style="height: 300px; margin: 20px 0; border-radius: 12px;" src="{{ asset('images/'. $post->image) }}" alt="post-image">
    </div>
    @endif
    <div class="accordion" id="post-info">
        <div class="accordion-item mt-4">
            <h2 class="accordion-header" id="post-info-heading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Post Info
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="post-info-heading"
                data-bs-parent="#post-info">
                <div class="accordion-body">
                    <p><strong>Title: </strong>{{ $post->title }}</p>
                    <p><strong>Description: </strong>{{ $post->description }}</p>
                </div>
            </div>
        </div>
        <div class="accordion-item mt-4">
            <h2 class="accordion-header" id="post-creator-info-heading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    Post Creator Info
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="post-creator-info-heading"
                data-bs-parent="#post-creator-info">
                <div class="accordion-body">
                    <p><strong>Name: </strong>{{ $post->user->name }}</p>
                    <p><strong>Email: </strong>{{ $post->user->email }}</p>
                    <p><strong>Created At:
                        </strong>{{ \Carbon\Carbon::parse($post->created_at)->format('l jS \of F Y h:i:s A') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 w-75 mx-auto">
        @if ($comments->count() > 0)
            <h2>Comments</h2>
            @foreach ($comments as $comment)
                <div class="comment-container d-flex justify-content-between align-items-start">
                    <div class="alert alert-light my-0 me-4" role="alert">
                        <p class="my-0"><strong>Comment</strong> {{ $comment->comment }}</p>
                        <p class="my-0 text-info">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="d-flex pt-4">
                        <button name="edit-btn" id="edit-btn" class="btn btn-primary edit-btn" href=""
                            data-id="{{ $comment->id }}" role="button">Edit</button>
                        <button type="button" class="btn btn-danger mx-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id="{{ $comment->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Comment</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete comment?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="POST" id='delete-form'>
                                            @csrf
                                            @method('DELETE')
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="commentable_id"
                                                value="{{ $comment->commentable_id }}">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-edit-container d-none " role="alert" data-comment-id="{{ $comment->id }}">
                    <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="POST" id='edit-form'
                        class="alert alert-light my-0 d-flex justify-content-between align-items-center">
                        @csrf
                        @method('PATCH')
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="commentable_id" value="{{ $comment->commentable_id }}">
                        <textarea class="form-control flex-fill me-4" name="comment" id="comment" rows="3" required>{{ $comment->comment }}</textarea>
                        <div class="d-flex flex-column" style="width: 80px;">
                            <button type="submit" class="btn btn-primary edit-btn-confirm my-1">Update</button>
                            <button type="button" class="btn btn-secondary edit-cancel-btn my-1">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        @else
            <h2>No Comments</h2>
        @endif
        <div class="mt-3">
            {{ $comments->links() }}
        </div>

        <form action="{{ route('comments.store') }}" method="POST" class="my-4 mx-auto">
            @csrf
            <fieldset>
                <legend>
                    <h2 class="mt-4 pb-0 mb-0">Add new comment</h2>
                </legend>
                <div class="mb-3">
                    <input type="text" id="commentable_id" name="commentable_id" class="form-control"
                        value="{{ $post->id }}" hidden>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </fieldset>
        </form>
    </div>

    <script>
        let id;
        $(document).ready(function() {
            $('button[data-bs-target="#exampleModal"]').on('click', function() {
                id = $(this).get(0).dataset['id'];
                $('#delete-form').attr('action', '/comments/' + id);
            });

            $('.edit-btn').on('click', function() {
                $(this).closest('.comment-container').toggleClass('d-none');
                $(this).closest('.comment-container').next().toggleClass('d-none');
            })

            $('.edit-cancel-btn').on('click', function() {
                $(this).closest('.comment-edit-container').toggleClass('d-none');
                $(this).closest('.comment-edit-container').prev().toggleClass('d-none')
            })
        });
    </script>
@endsection
