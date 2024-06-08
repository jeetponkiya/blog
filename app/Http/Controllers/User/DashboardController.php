<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $postId = [];
        $posts = Post::doesntHave('users')->inRandomOrder()->with('tags')->take(5)->get();
        foreach ($posts as $post) {
            $postId[] = $post->id;
        }
        $user->posts()->attach($postId);
        
        return view('User.Dashboard',['posts' => $posts]);
  
    }
}
