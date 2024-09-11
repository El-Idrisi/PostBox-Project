<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function postbox()
    {
        $user = auth()->user()->load('profile');

        return view('posts.index', compact('user'))->with('success', 'Task Created Successfully!');
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

        if ($request->hasFile('image')) {
            $path = time() . "-" . str()->random() . '.' . $request->file('image')->extension();
            $request->image->move(public_path('img/posts'), $path);
            $validate['image'] = 'posts/'.$path;
        }

        Post::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $validate['image'] ?? null,
        ]);


        return redirect()->route('fresh')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user.profile']);
        $isLiked = $post->isLikedBy(auth()->user());

        return view('posts.show', compact('post', 'isLiked'));
    }

    public function addComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1255',
        ]);
        $comment = new Comment([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        $post->comments()->save($comment);

        return back()->with('success', 'Comment added successfully');
    }

    public function like(Post $post)
    {
        $user = auth()->user();
        $existing_like = Like::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existing_like) {
            $existing_like->delete();
            $action = 'unliked';
        } else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id
            ]);
            $action = 'liked';
        }

        return response()->json([
            'success' => true,
            'likes_count' => $post->likes()->count(),
            'action' => $action
        ]);
    }
}
