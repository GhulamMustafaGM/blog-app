<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreatePost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function __construct() {
        $this->middleware('CheckRole:author');
            
    }
    //
    public function dashboard() {
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $allComments = Comment::whereIn('post_id', $posts)->get();
        $todayComments = $allComments->where('created_at', '>=', \Carbon\Carbon::today())->count(); 
        
        return view('author.dashboard', compact('allComments', 'todayComments'));
    }

    public function posts() {
        return view('author.posts');
    }

    public function comments() {
        return view('author.comments');
    }

    public function newPost() {
        return view('author.newPost');
    }

    public function createPost(CreatePost $request) {
        $post = new Post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->user_id = Auth::id();
        $post->save();

        return back()->with('success', 'Post is successfully created.');
    }

    public function postEdit($id) {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
            return view('author.editPost', compact('post'));
    }

    public function postEditPost(CreatePost $request, $id) {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', "Post updated successfully ");
    }

    public function deletePost($id){
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->delete();
        return back();
    }
}
