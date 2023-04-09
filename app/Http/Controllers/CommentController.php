<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store()
    {
        if (!empty($_POST['comment'])) {
            Comment::create([
                'comment' => $_POST['comment'],
                'commentable_type' => 'App\Models\Post',
                'commentable_id' => $_POST['commentable_id']
            ]);
        }
        return redirect('/posts/' . $_POST['commentable_id']);
    }

    public function update($id)
    {
        DB::table('comments')->where('id', $id)->update([
            'comment' => $_POST['comment']
        ]);

        $post = Post::find($_POST['commentable_id']);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $_POST['commentable_id'])->paginate(3);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function destroy($id)
    {
        DB::table('comments')->where('id', $id)->delete();

        $post = Post::find($_POST['commentable_id']);
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $_POST['commentable_id'])->paginate(3);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
