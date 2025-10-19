<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display the sign-in/register page.
     */
    public function showSignin()
    {
        return view('signin');
    }
    public function showLogin()
    {
        return view('login');
    }

/**
 * Handle user registration.
 */
public function register(Request $request)
{
    // Validate the request
    $request->validate([
        'fullname' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // Validates password_confirmation
        'agree' => 'accepted', // Ensures terms checkbox is checked
    ]);

    // Create the user
    $user = User::create([
        'fullname' => $request->fullname,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_admin' => false, // Default to non-admin
    ]);

    // Redirect to login page with success message
    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
}

/**
 * Handle user login.
 */
public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Attempt to log in with username and password
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $request->session()->regenerate();

        // Check if the user is an admin
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route('admin.profile')->with('success', 'Logged in successfully!');
        }

        // Redirect regular users to their profile
        return redirect()->route('user.profile')->with('success', 'Logged in successfully!');
    }

    // Return error if credentials are invalid
    throw ValidationException::withMessages([
        'username' => ['The provided credentials do not match our records.'],
    ]);
}

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }
}
