<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StoreBlogPost;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(3);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPost $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $path = $request->file('image')->store('image', 'public');
            $post->image = $path;
        }
        $post->save();

        event(new PostCreated($post));

        return redirect()->route('posts.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBlogPost $request, string $id)
    {
        //
        $post = Post::find($id);
        if($post->user_id !== Auth::id()){
            abort(403,'Unauthorized action.');
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $post=Post::find($id);
        if($post->user_id !== Auth::id()){
            abort(403,'Unauthorized action.');
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
