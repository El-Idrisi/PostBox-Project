<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   // Menampilkan halaman login
   public function showLoginForm()
   {
       return view('login');
   }

   // Proses login
   public function login(Request $request)
   {
       $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
           return redirect()->intended('/dashboard');
       }

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ]);
   }

   // Menampilkan halaman register
   public function showRegisterForm()
   {
       return view('register');
   }

   // Proses registrasi
   public function register(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

       User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       return redirect()->route('login')->with('success', 'Registration successful. Please login.');
   }

   // Menampilkan dashboard setelah login berhasil
   public function dashboard()
   {
       return view('dashboard');
   }

   // Logout
   public function logout(Request $request)
   {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect('/login');
   }
}