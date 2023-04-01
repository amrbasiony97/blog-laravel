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
                'description' => 'Node JS is a JavaScript runtime built on Chrome V8.',
                'posted_by' => 'John Doe',
                'created_at' => '2020-01-01'
            ],
            [
                'id' => 2,
                'title' => 'Laravel',
                'description' => 'Laravel is a PHP framework for building web applications.',
                'posted_by' => 'Mary Smith',
                'created_at' => '2023-02-10'
            ],
            [
                'id' => 3,
                'title' => 'Django',
                'description' => 'Django is a Python framework for developing web applications.',
                'posted_by' => 'Adrian Boy',
                'created_at' => '2022-07-22'
            ],
            [
                'id' => 4,
                'title' => 'Ruby on Rails',
                'description' => 'Ruby on Rails is a web framework for building web applications.',
                'posted_by' => 'Young Lee',
                'created_at' => '2021-11-07'
            ]
        ];
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Store data in database
        // ...

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = [
            'id' => 1,
            'title' => 'Node JS',
            'description' => 'Node JS is a JavaScript runtime built on Chrome V8.',
            'posted_by' => 'John Doe',
            'created_at' => '2020-01-01'
        ];
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

        return redirect()->route('posts.index');
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

        return redirect()->route('posts.index');
    }
}
