<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('profile');

        return view('search.index', compact('user'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $user = auth()->user()->load('following');

        $users = User::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
                ->orWhereHas('profile', function ($q) use ($query) {
                    $q->where('username', 'LIKE', "%{$query}%");
                });
        })
        ->with('profile')  // Eager load profile
        ->get();

        $followingIds = $user->following->pluck('id')->toArray();

        return view('search.result', compact('users', 'query','user', 'followingIds'));
        // dd($query, $users);
    }
}
