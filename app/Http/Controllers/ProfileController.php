<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post; // Assuming you have a Post model for blog posts

class ProfileController extends Controller
{
    /**
     * Display the user profile.
     */
    public function showUserProfile()
    {
        $user = Auth::user();
        // Fetch posts if users can create posts (optional)
        $posts = Post::where('user_id', $user->id)->get();
        
        return view('profile.user', compact('user', 'posts'));
    }

    /**
     * Display the admin profile.
     */
    public function showAdminProfile()
    {
        $user = Auth::user();
        // Fetch posts created by the admin
        $posts = Post::where('user_id', $user->id)->get();
        
        return view('profile.admin', compact('user', 'posts'));
    }
}