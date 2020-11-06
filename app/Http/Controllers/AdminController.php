<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use CreatePostsTable;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Charts\DashboardChart;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('CheckRole:admin');
        $this->middleware('auth');
            
    }
    //
    public function dashboard() {

        $chart = new DashboardChart;

        $days = $this->generatedDateRange(Carbon::now()->subDays(30), Carbon::now());

        $comments = [];

        foreach ($days as $day) {
            $comments[] = Comment::whereDate('created_at', $day)->count();
        }

        $chart->dataset('Comments', 'line', $comments);
        $chart->labels($days);

        return view('admin.dashboard', compact('chart'));
    }

    private function generatedDateRange(Carbon $start_date, Carbon $end_date) {
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
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

    public function editUserPost(UserUpdate $request, $id) {
        $user = User::where('id', $id)->first();
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($request['author'] == 1 ) {
            $user->author = true;
        } elseif($request['admin'] == 1) {
            $user->admin = true;
        }
        $user->save();
        return back()->with('success', 'User updated successfully ');
    }

    public function deleteUser($id) {
        $user = User::where('id', $id)->first();
        $user->delete();

        return back();
    }

    public function products() {

    }

    public function newProduct() {

    }

    public function newProductPost(Request $request) {

    }

    public function editProduct() {

    }

    public function editProductPost(Request $request) {

    }
}
