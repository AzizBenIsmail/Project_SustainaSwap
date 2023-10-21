<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withCount('comments')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->get();

        $posts->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id() ?: 1;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); 
            $post->image_url = $imagePath;
        }
        $post->save();

        session()->flash('success',' Post added successfully.');
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    
        if ($post) {
            $post->load(['comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }]);
            return view('posts.show', compact('post'));
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); 
            $post->image_url = $imagePath;
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    

///////////////////backoffice
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function allPost()
{

    $posts = Post::withCount('comments')
    ->orderBy('created_at', 'desc') // Order by created_at in descending order
    ->get();
    return view('posts.backOffice.index', compact('posts'));
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.allPost')->with('success', 'Post deleted successfully!');
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); 
            $post->image_url = $imagePath;
        }
        $post->save();

        return redirect()->route('posts.backOffice.index')->with('success', 'Post updated successfully!');
    }



        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeToAdmin(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id() ?: 1;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); 
            $post->image_url = $imagePath;
        }
        $post->save();

        session()->flash('success',' Post added successfully.');
        return redirect()->route('posts.allPost')->with('success', 'Post created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editToAdmin(Post $post)
    {

        return view('posts.backOffice.edit', compact('post'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateToAdmin(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); 
            $post->image_url = $imagePath;
        }
        $post->save();

        return redirect()->route('posts.allPost')->with('success', 'Post updated successfully!');
    }

}
