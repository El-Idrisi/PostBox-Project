<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function postbox()
    {
        $user = auth()->user()->load('profile');

        return view('posts.index', ['user' => $user])->with('success', 'Task Created Successfully!');
    }

    public function post(Request $request)
    {
        $user = auth()->user();

        if (auth()->id() !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this profile.');
        }


        $validate = $request->validate([
            "image" => 'mimes:png,jpg,jpeg,webp|nullable|image|max:1024',
            "title" => 'required|string|max:50',
            "content" => 'required|string|max:255'
        ]);

        // $request->validate([
        //     "title" => ['required','string','max:50'],
        //     "content" => ['required','string','max:255'],
        //     "image" => 'image|nullable|max:1024|mimes:png,jpg,jpeg,webp',
        // ]);
        // dd($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('post-img', 'public');
            $validate['image'] = $path;
        }

        Post::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $validate['image'] ?? null,
        ]);


        return redirect()->route('Postbox')->with('success', 'Post created successfully!');


    }
}
