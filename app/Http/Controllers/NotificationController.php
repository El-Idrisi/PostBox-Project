<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('profile');
        // $notifications = auth()->user()->load('notifications');
        $notifications = auth()->user()->notifications()
            ->where('is_read', false)
            ->with(['follow.follower.profile'])
            ->latest()
            ->get();



        return view('notifications.index', compact('notifications', 'user'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
        return back()->with('success', 'Notification marked as read');
    }
}
