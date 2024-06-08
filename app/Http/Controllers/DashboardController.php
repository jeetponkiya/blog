<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreviewSessions;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->get();
        return view('Dashboard', ['posts' => $posts]);
    }

}
