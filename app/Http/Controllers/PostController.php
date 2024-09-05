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

        return view('postbox', ['user' => $user])->with('success', 'Task Created Successfully!');
    }

    public function post(Request $request)
    {
        $user = auth()->user();

        if (auth()->id() !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this profile.');
        }

        // dd($request->all());

        $validate = $request->validate([
            "image" => 'mimes:png,jpg,jpeg|nullable',
            "title" => 'required|string|max:50',
            "content" => 'required|string|max:255'
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image')->store('public/post-img');
        //     $validate['image'] = $image;
        // }

        // $post = new Post();
        // $post->user_id = $user->id;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();



        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('post-img', 'public');
            $validate['image'] = $path;
        }

        Post::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $validate['image'],
        ]);


        return redirect()->route('Postbox')->with('success', 'Post created successfully!');


    }
}
