<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show($post)
    {

        $post = Post::find($post);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {

        return view('posts.create', [
            'users' => User::all()
        ]);
    }


    public function store(StorePostRequest $myRequestObject)
    {
        $data = $myRequestObject->all();

        // request()->validate(
        //     [
        //         'title' => ['required', 'min:3',],
        //         'posted_by' => 'required',
        //         'description' => ['required', 'min:3',]
        //     ],
        //     [
        //         'title.required' => 'Title is musting',
        //         'title.min' => 'Title must be at least 3 characters',
        //         'posted_by.required' => 'Posted by is required',
        //         'description.required' => 'Description is required',
        //         'description.min' => 'Description must be at least 3 characters',
        //     ]
        // );
        Post::create(
            [
                'title' => $data['title'],
                'posted_by' => $data['posted_by'],
                'description' => $data['description'],
            ]
        );
        return redirect()->route('posts.index');
    }

    public function edit($post)
    {
        $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }



    public function update(StorePostRequest $myRequestObject, $post)
    {
        dd($myRequestObject);
        $data = request()->all();
        $post = Post::find($post);

        $post->update(
            [
                'title' => $data['title'],
                'posted_by' => $data['posted_by'],
                'description' => $data['description'],
            ]
        );
        return redirect()->route('posts.index');
    }

    public function destroy($post)
    {

        $post = Post::find($post);
        $post->delete();
        return redirect()->route('posts.index');
    }


}


