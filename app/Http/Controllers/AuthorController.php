<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
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
}
