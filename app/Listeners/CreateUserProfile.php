<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Profile;

class CreateUserProfile
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Profile::create([
            'user_id' => $event->user->id,
            'username' => null,
            'bio' => 'Welcome to my profile!',
            'birth_of_day' => null,
            'gender' => null,
            'profile_picture' => 'profile_pictures/logo.png'
        ]);
    }
}
