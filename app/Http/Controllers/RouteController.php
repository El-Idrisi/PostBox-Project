<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RouteController extends Controller
{

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
}
