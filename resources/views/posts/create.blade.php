@extends('layout.app')

@section('title') Create @endsection

@section('content')

<form action="{{ route('posts.store') }}" method="POST" class="w-50 mt-3 mx-auto">
    @csrf
    <fieldset>
        <legend>Create new post</legend>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="post-creator" class="form-label">Post Creator</label>
            <select class="form-select form-select" name="post-creator" id="post-creator">
                <option value="ahmed">Ahmed</option>
                <option value="amr">Amr</option>
                <option value="mohamed">Mohamed</option>
                <option value="saad">Saad</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </fieldset>
</form>

@endsection
