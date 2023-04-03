@extends('layout.app')

@section('title')
    Show
@endsection

@section('content')
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
                    <p><strong>Created At: </strong>{{ \Carbon\Carbon::parse($post->created_at)->format('l jS \of F Y h:i:s A') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
