<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class ProfileController extends Controller
{
    public function index()
    {
        $casts = DB::table('profiles')->get();
        return view('Home', compact('profile'));
    }

    public function show($username)
    {
        $user = auth()->user()->load('profile');
        $target = User::where('name', $username)->firstOrFail();
        $postCount = $target->posts()->count();
        $followerCount = $target->followers()->count();
        $followingCount = $target->following()->count();

        return view('profile', compact('target', 'postCount', 'followerCount', 'followingCount', 'user'));
    }

    public function edit($username)
    {
        $user = auth()->user()->load('profile');

        return view('editProfile', compact('user'));
    }

    public function update(Request $request, $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        // Pastikan user yang login adalah pemilik profil
        if (auth()->id() !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this profile.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,name,' . $user->id],
            'profile_picture' => 'image|nullable|max:1024|mimes:png,jpg,jpeg,webp',
            'birth_of_day' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:Male,Female,Other'],
            'bio' => ['required', 'string', 'max:500']
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->save();

        // Update or create profile
        $profile = $user->profile ?? new Profile();
        $profile->username = $request->input('username');
        $profile->birth_of_day = $request->input('birth_of_day');
        $profile->gender = $request->input('gender');
        $profile->bio = $request->input('bio');

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $profile->profile_picture = $path;
        }

        $user->profile()->save($profile);

        return redirect()->route('profile.show', $user->name)->with('success', 'Profile updated successfully!');
    }
}
