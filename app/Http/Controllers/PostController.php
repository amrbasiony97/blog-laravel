<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

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

    public function store()
    {
        $title = 'Spring Boot';
        $description = 'Spring Boot is a web application framework';
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['user_id'])) {
            Post::create([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'user_id' => $_POST['user_id']
            ]);
        }
        return to_route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Post::with('comments')->paginate(5);

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

    public function update($id)
    {
        $affected = DB::table('posts')->where('id', $id)->update([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'user_id' => $_POST['user_id']
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
        DB::table('posts')->where('id', $id)->delete();
        return to_route('posts.index');
    }
}
