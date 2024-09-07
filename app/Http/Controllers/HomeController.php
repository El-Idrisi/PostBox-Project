<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        $user = auth()->user()->load('profile');
        $posts = Post::with(['user.profile'])
            ->inRandomOrder()
            ->paginate(30);

        return view('posts.home', compact('posts', 'user'));
    }
}
