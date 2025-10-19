<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display the homepage with featured or recent posts.
     */
    public function index()
    {
        $posts = Post::with(['category', 'user', 'tags', 'comments'])
                     ->latest()
                     ->take(6)
                     ->get();

        $categories = Category::all();

        return view('index', compact('posts', 'categories'));
    }

    /**
     * Display admin profile with user info and posts (recipes).
     */
    public function adminProfile()
    {
        $user = Auth::user();

        // Fetch user's posts (recipes) with related data
        $posts = Post::with(['category', 'user', 'tags', 'comments'])
                     ->where('user_id', $user->id)
                     ->latest()
                     ->get();

        // Calculate stats
        // $postsCount = Post::where('user_id', $user->id)->count();
        // $viewsCount = Post::where('user_id', $user->id)->sum('views') ?? 0; // Assuming a views column
        // $followersCount = $user->followers()->count() ?? 0; // Assuming a followers relation

        // $user->posts_count = $postsCount;
        // $user->views_count = $viewsCount;
        // $user->followers_count = $followersCount;

        // return view('admin.profile', compact('user', 'posts'));
    }

    /**
     * Show the form for creating a new post (recipe).
     */
    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('login')->with('error', 'Unauthorized action.');
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created post (recipe) in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('login')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'views' => 0, // Initialize views if not present
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.profile')->with('success', 'Recipe created successfully!');
    }

    /**
     * Display a single post (recipe) with its details and comments.
     */
    public function show($id)
    {
        $post = Post::with(['category', 'user', 'tags', 'comments.user'])
                    ->findOrFail($id);

        return view('single-post', compact('post'));
    }

    /**
     * Show the form for editing the specified post (recipe).
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id() || !Auth::user()->is_admin) {
            return redirect()->route('admin.profile')->with('error', 'Unauthorized action.');
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified post (recipe) in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id() || !Auth::user()->is_admin) {
            return redirect()->route('admin.profile')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.profile')->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified post (recipe) from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id() || !Auth::user()->is_admin) {
            return redirect()->route('admin.profile')->with('error', 'Unauthorized action.');
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.profile')->with('success', 'Recipe deleted successfully!');
    }

    /**
     * Handle search queries for posts (recipes).
     */
    public function search(Request $request)
    {
        $query = $request->query('query', '');

        $posts = Post::with(['category', 'user', 'tags', 'comments'])
                     ->where('title', 'like', "%{$query}%")
                     ->orWhere('content', 'like', "%{$query}%")
                     ->paginate(10);

        $categories = Category::all();

        return view('search', compact('posts', 'query', 'categories'));
    }
}
