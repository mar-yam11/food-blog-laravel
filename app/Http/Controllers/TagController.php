<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($id) {
    $tag = Tag::findOrFail($id);
    $posts = Post::whereHas('tags', function($query) use ($id) { $query->where('tag_id', $id); })->paginate(10);
    return view('tags', compact('tag', 'posts'));
}
}
