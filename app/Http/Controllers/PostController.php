<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Node JS',
                'posted_by' => 'John Doe',
                'created_at' => '2020-01-01'
            ],
            [
                'id' => 2,
                'title' => 'Laravel',
                'posted_by' => 'Mary Smith',
                'created_at' => '2023-02-10'
            ],
            [
                'id' => 3,
                'title' => 'Django',
                'posted_by' => 'Adrian Boy',
                'created_at' => '2022-07-22'
            ],
            [
                'id' => 4,
                'title' => 'Ruby on Rails',
                'posted_by' => 'Young Lee',
                'created_at' => '2021-11-07'
            ]
        ];
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
