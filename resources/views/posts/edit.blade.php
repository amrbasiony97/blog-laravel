@extends('layout.app')

@section('title') Edit @endsection

@section('content')

<form action="{{ route('posts.update', ['post' => $old_post['id']]) }}" method="POST" class="w-50 mt-3 mx-auto">
    @csrf
    @method('PATCH')
    {{ method_field('PATCH') }}
    <fieldset>
        <legend><h2>Update Post</h2></legend>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $old_post['title'] }}" required>
        </div>
        <div class="mb-3">
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3"  required>{{ $old_post['description'] }}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Post Creator</label>
            <select class="form-select form-select" name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($old_post->user->id === $user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </fieldset>
</form>

@endsection
