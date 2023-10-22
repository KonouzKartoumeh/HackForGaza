<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ResourceLink;
use Illuminate\Http\Request;
use App\Models\DataType; // Import the DataType model

class PostController extends Controller
{
    public function index()
    {
        $r= ResourceLink::all();
        $posts = Post::with('resourceLinks') // Eager load the related resource links
            ->latest()
            ->get();
            
        // Transform the data to include resource link content
        
    
        return response()->json($posts);
    }

    public function create()
    {
        $dataTypes = DataType::all(); // You can add orderBy if needed

        return view('posts.create', ['dataTypes' => $dataTypes]);
    }

    public function store(Request $request)
    {
     // dd($request);
        // Validation and post creation logic
        $post = Post::create([
            'content' => $request->input('content'),
            'year' => $request->input('year'),
            'metadata'  => $request->input('year'),
            'summary'  => $request->input('summary'),
            
        ]);
    
        // Store resource links with data type
        $resourceLinksData = $request->input('resource_link');
        $dataTypes = $request->input('data_type_id');
        $resourceLinks = [];
    
        if (!empty($resourceLinksData)) {
            foreach ($resourceLinksData as $key => $link) {
                if (!empty($link)) {
                    $dataTypeId = $dataTypes[$key] ?? null;
                    $resourceLinks[] = new ResourceLink([
                        'url' => $link,
                        'data_type_id' => $dataTypeId,
                    ]);
                }
            }
        }
    
        $post->resourceLinks()->saveMany($resourceLinks);
    
        $notification = [
            'message' => 'Time frame created successfully.',
            'alert' => 'success',
        ];
    
        return redirect('/posts/create')->with('notification', $notification);
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

