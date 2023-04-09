@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')

    <form action="{{ route('posts.update', ['post' => $old_post['id']]) }}" method="POST" class="w-50 mt-3 mx-auto" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{ method_field('PATCH') }}
        <fieldset>
            <legend>
                <h2>Update Post</h2>
            </legend>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $old_post['title'] }}"
                required>
            </div>
            <input type="text" name="post_id" value="{{ $old_post['id'] }}" hidden>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required>{{ $old_post['description'] }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Post Creator</label>
                <select class="form-select form-select" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($old_post->user->id === $user->id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </fieldset>
    </form>

@endsection
