<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::latest()->get(['year', 'content', 'resource_link']);
        return response()->json($posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validation and post creation logic
        $post = Post::create([
            // 'title' => $request->input('title'),
            'content' => $request->input('content'),
            'year' => $request->input('year'),
            'resource_link' => $request->input('resource_link'),
        ]);
        $notification = [
            'message' => 'time frame created successfully.',
            'alert' => 'success',
        ];

        return redirect('/posts/create') ->with('notification', $notification);
    }

    public function show(Post $post)
    {
        return response()->json([
            'year' => $post->year,
            'content' => $post->content,
            'resource_link' => $post->resource_link,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}

