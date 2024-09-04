<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RouteController extends Controller
{


    public function fresh()
    {
        $user = auth()->user()->load('profile');
        $freshPosts = Post::with('user.profile')
            ->latest()
            ->paginate(10);

        return view('fresh', compact('user', 'freshPosts'));
    }

    public function notification()
    {
        $user = auth()->user()->load('profile');

        return view('notification', ['user' => $user]);
    }

    public function profile()
    {
        $user = auth()->user()->load('profile');

        return view('profile', ['user' => $user]);
    }

    public function postbox()
    {
        $user = auth()->user()->load('profile');

        return view('postbox', ['user' => $user]);
    }

    public function search()
    {
        $user = auth()->user()->load('profile');

        return view('search', ['user' => $user]);
    }
}
