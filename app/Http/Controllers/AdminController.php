<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use CreatePostsTable;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('CheckRole:admin');
            
    }
    //
    public function dashboard() {
        return view('admin.dashboard');
    }

    
    public function comments() {
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));
    }

    public function deleteComment($id) {
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return back();
    }

    public function posts() {
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function postEdit($id) {
        $post = Post::where('id', $id)->first();
        return view('admin.editPost', compact('post'));
    }

    public function postEditPost(CreatePost $request, $id) {
        $post = Post::where('id', $id)->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', "Post updated successfully ");
    }

    public function deletePost($id) {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return back();
    }

    public function users() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function editUser($id) {
        $user = User::where('id', $id)->first();
        return view('admin.editUser', compact('user'));
    }
}
