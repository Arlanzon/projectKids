<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:posts.view')->only(['index', 'show']);
        $this->middleware('permission:posts.create')->only(['create', 'store']);
        $this->middleware('permission:posts.update|posts.update.own')->only(['edit', 'update']);
        $this->middleware('permission:posts.delete|posts.delete.own')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $posts = Post::with(['category', 'user', 'tags'])
        ->latest()
        ->paginate(10);
 
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
 
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StorePostRequest $request)
    {
         

        Post::create($request->validated());
 
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //carga de relaciones 
        $post->load (['category', 'user', 'tags', 'comments']);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
 
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index');
    }
}
