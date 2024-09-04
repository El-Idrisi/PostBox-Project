<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FreshController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('profile');
        $freshPosts = Post::with(['user.profile'])
            ->latest()
            ->paginate(30);

        return view('fresh', compact('freshPosts', 'user'));    
    }
}
