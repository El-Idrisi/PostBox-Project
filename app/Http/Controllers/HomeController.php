<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $user = auth()->user()->load('profile');
        $posts = Post::with(['user.profile'])
            ->inRandomOrder()
            ->paginate(30);

        return view('home', compact('posts', 'user'));
    }
}
