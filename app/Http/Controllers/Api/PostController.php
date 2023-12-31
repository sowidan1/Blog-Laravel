<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PostController extends Controller
{
    public function index()
    {
    $posts= Post::all();

    return PostResource::collection($posts);
    }



    public function show($post)
    {
        $post= Post::find($post);
        return new PostResource($post);
    }
}
