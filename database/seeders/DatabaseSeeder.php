<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'idrisi',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        User::factory()->create([
            'name' => 'budi1',
            'email' => 'budi1@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        User::factory()->create([
            'name' => 'budi2',
            'email' => 'jago@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            PostSeeder::class,
        ]);
    }
}
