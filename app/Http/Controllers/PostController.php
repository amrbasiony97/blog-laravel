<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::paginate(5);
        return view('posts.index', $data);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('images'), $filename);
        }
        else {
            $filename = null;
        }

        $data = $request->all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'image' => $filename
        ]);
        return to_route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $id)->paginate(3);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        $old_post = Post::find($id);
        $users = User::all();

        return view('posts.edit', [
            'old_post' => $old_post,
            'users' => $users
        ]);
    }

    public function update($id, UpdatePostRequest $request)
    {
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('images'), $filename);
            if ($post->image) {
                File::delete(public_path('images').'/'. $post->image);
            }
        }
        else {
            $filename = $post->image;
        }

        $data = $request->all();
        DB::table('posts')->where('id', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'image' => $filename
        ]);
        return to_route('posts.index');
    }

    public function delete($id)
    {
        return view('posts.delete', [
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            File::delete(public_path('images').'/'. $post->image);
        }
        DB::table('posts')->where('id', $id)->delete();
        DB::table('comments')->where('commentable_id', $id)->delete();
        return to_route('posts.index');
    }
}
