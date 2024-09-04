<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function home()
    {
        $user = auth()->user()->load('profile');

        return view('home', ['user' => $user]);
    }

    public function fresh()
    {
        $user = auth()->user()->load('profile');

        return view('fresh', ['user' => $user]);
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
