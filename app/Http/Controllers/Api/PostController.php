<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return new PaginatedResourceResponse(
            PostResource::collection($posts),
            $posts->toArray()
        );
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $id)->paginate(3);

        return [
            'post' => new PostResource($post),
            'comments' => new PaginatedResourceResponse(
                CommentResource::collection($comments),
                $comments->toArray()
            )
        ];
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }

        $data = $request->all();
        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'image' => $filename
        ]);

        return new PostResource($post);
        return $post;
    }
}
