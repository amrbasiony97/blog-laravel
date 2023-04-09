{{-- @extends('layout.app')

@section('title')
    Delete
@endsection

@section('content')
    <div class="mt-4 text-center">
        <h3>Are you sure to delete post with id = {{ $id }} ?</h3>

        <form action="{{ route('posts.destroy', ['post' => $id]) }}" method="POST" class="w-50 mt-3 mx-auto">
            @csrf
            @method('DELETE')
            {{ method_field('DELETE') }}
            <a class="btn btn-primary" href="{{ route('posts.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-success">Delete</button>
        </form>
    </div>
@endsection --}}
