<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,chauffeur,passager',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'profile_photo' => $path,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('login')->with('success', 'User registered successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

