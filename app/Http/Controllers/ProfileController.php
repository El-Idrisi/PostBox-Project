<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use App\Models\Notification;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log as FacadesLog;

use function Laravel\Prompts\error;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class ProfileController extends Controller
{

    public function show($username)
    {
        $user = auth()->user();
        $target = User::where('name', $username)->firstOrFail();
        $postCount = $target->posts()->count();
        $followerCount = $target->followers()->count();
        $followingCount = $target->following()->count();

        $isFollowing = $user->following()->where('following_id', $target->id)->exists();

        return view('profile.index', compact('target', 'postCount', 'followerCount', 'followingCount', 'user', 'isFollowing'));
    }

    public function edit($username)
    {
        $user = auth()->user()->load('profile');

        return view('profile.edit', compact('user'));
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
            $imageName = time() . "-" . str()->random() . '.' . $request->file('profile_picture')->extension();
            $request->profile_picture->move(public_path('img/profile_pictures'), $imageName);
            $profile->profile_picture = 'profile_pictures/'. $imageName;
        }

        $user->profile()->save($profile);

        return redirect()->route('profile.show', $user->name)->with('success', 'Profile updated successfully!');

        // dd($request->all(), $imageName);
    }

    public function setting($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return view('profile.settings', compact('user'));
    }

    // * PASSWORD CONTROLLERS
    public function show_change_pass($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return view('profile.change-pass', compact('user'));
    }

    public function changePassword(Request $request, $name)
    {


        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('name', $name)->firstOrFail();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.show', $user->name)->with('success', 'Password changed successfully!');

        // dd($request->all(), !Hash::check($request->new_password, $user->password));
    }
    // * PASSWORD CONTROLLERS

    // * EMAIL CONTROLLERS
    public function showChangeEmail($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return view('profile.change-email', compact('user'));
    }

    public function changeEmail(Request $request, $name)
    {
        $request->validate([
            'current_password' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::where('name', $name)->firstOrFail();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password is incorrect.']);
        }

        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.show', $user->name)->with('success', 'Email changed successfully!');
    }
    // * EMAIL CONTROLLERS

    // * DELETE CONTROLLERS
    public function showDeleteAccount($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return view('profile.delete-account', compact('user'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
        ]);

        $user = Auth::user();


        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password is incorrect.']);
        }

        // // Perform any cleanup tasks here (e.g., deleting related data)

        Auth::logout();
        User::destroy($user->id);

        return redirect()->route('login')->with('success', 'Your account has been successfully deleted.');

        // dd($request->all(), !Hash::check($request->password, $user->password));
    }
    // * DELETE CONTROLLERS

    // * FOLLOW CONTROLLERS
    public function follow(User $user)
    {
        // auth()->user()->following()->attach($user->id);

        $follower = auth()->user();

        // Buat follow baru
        $follow = Follows::create([
            'follower_id' => $follower->id,
            'following_id' => $user->id
        ]);

        // Buat notifikasi
        Notification::create([
            'user_id' => $user->id,  // User yang difollow
            'follow_id' => $follow->id
        ]);

        // dd($follow->id);


        return back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back()->with('success', 'You have unfollowed ' . $user->name);
    }
}
