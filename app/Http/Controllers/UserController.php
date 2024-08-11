<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('userregister');
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'is_super_admin' => 'nullable|boolean',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Hash the password
            'is_super_admin' => $request->has('is_super_admin') ? 1 : 0,
        ]);

        Auth::login($user);
        
        if ($user->is_super_admin) {
            return redirect()->route('superadmin.login');
        }

        return redirect()->route('home');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('userlogin');
    }

    // Handle user login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->is_super_admin) {
                return redirect()->route('superadmin.dashboard');
            }

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
