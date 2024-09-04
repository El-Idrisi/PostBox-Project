<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Profile::create([
                'user_id' => $user->id,
                'username' => $user->name,
                'bio' => 'This is a bio for ' . $user->name,
                'birth_of_day' => now()->subYears(rand(18, 60)),
                'gender' => ['Male', 'Female'][rand(0, 1)],
                'profile_picture' => 'profile_pictures/logo.png'
            ]);
        });
    }
}
