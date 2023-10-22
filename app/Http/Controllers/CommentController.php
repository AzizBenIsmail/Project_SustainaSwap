<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('comments.create', compact('posts'));
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment;
        $comment->text = $request->input('text');
        $comment->user_id = Auth::id() ?: 1;
        $comment->post_id = $request->input('post_id') ?: 1;
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comment created successfully!');
    }

    /**
     * Display the specified comment.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $comment->text = $request->input('text');
        $comment->save();

        return redirect()->route('posts.index')->with('success', 'Comment updated successfully!');
    }



        /**
     * Update the specified comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function updateToPost(Request $request, Comment $comment)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $comment->text = $request->input('text');
        $comment->save();

        return redirect()->route('posts.index')->with('success', 'Comment updated successfully!');
    }
    /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
    }



        /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        try {
            $comment->forceDelete();
            return redirect()->route('posts.index')->with('success', 'Comment deleted successfully!');
        } catch (\Exception $e) {
            logger()->error($e);
            return redirect()->back()->with('error', 'Failed to delete the comment.');
        }
    }

        /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment;
        $comment->text = $request->input('text');
        $comment->user_id = Auth::id() ?: 1;
        $comment->post_id = $request->input('post_id') ?: 1;
        $comment->save();

        return redirect()->route('posts.index')->with('success', 'Comment created successfully!');
    }



    /////backoffice part

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allComment()
    {
        $posts = Post::all();
        $comments = Comment::all();
        
        return view('comments.backOffice.index', compact('comments', 'posts'));
    }


        /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroyByAdmin(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.allComment')->with('success', 'Comment deleted successfully!');
    }
        


        /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromAdmin(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment;
        $comment->text = $request->input('text');
        $comment->user_id = Auth::id() ?: 1;
        $comment->post_id = $request->input('post_id') ?: 1;
        $comment->save();

        return redirect()->route('comments.allComment')->with('success', 'Comment created successfully!');
    }



        /**
     * Update the specified comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function updateFromAdmin(Request $request, Comment $comment)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $comment->text = $request->input('text');
        $comment->save();

        return redirect()->route('comments.allComment')->with('success', 'Comment updated successfully!');
    }


        /**
     * Show the form for editing the specified comment.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function editFromAdmin(Comment $comment)
    {
        return view('comments.backOffice.edit', compact('comment'));
    }

}
