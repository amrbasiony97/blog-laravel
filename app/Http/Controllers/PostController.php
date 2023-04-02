<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        $title = 'Spring Boot';
        $description = 'Spring Boot is a web application framework';
        Post::create([
           'title' => $_POST['title'],
           'description' => $_POST['description'],
           'user_id' => $_POST['user_id']
        ]);
        return to_route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        // fetch data from database by $id
        $post = [
            'id' => 1,
            'title' => 'Node JS',
            'description' => 'Node JS is a JavaScript runtime built on Chrome V8.',
            'posted_by' => 'John Doe',
            'created_at' => '2020-01-01'
        ];
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($id)
    {
        // Update data in database
        // ...

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
        // Delete record from database
        // ...

        return to_route('posts.index');
    }
}
