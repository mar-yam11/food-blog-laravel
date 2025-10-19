{{-- @extends('layouts.master')

@section('content')
    <div class="admin-profile">
        <div class="container">
            <h2>Welcome, Admin {{ $user->fullname }}</h2>
            <div class="profile__info">
                <h4>Your Information</h4>
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> Administrator</p>
            </div>
            <div class="profile__posts">
                <h4>Your Posts</h4>
                @if ($posts->isEmpty())
                    <p>You haven't created any posts yet.</p>
                @else
                    <ul>
                        @foreach ($posts as $post)
                            <li>
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                {{-- <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form> --}}
{{-- </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <a href="{{ route('logout') }}" class="site-btn">Logout</a>
        </div>
    </div>
@endsection --}}
@extends('layouts.master')

@section('content')
    <div class="admin-profile">
        <div class="container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="{{ asset('images/avatar.webp') }}" alt="{{ $user->fullname }}" class="avatar-img">
                </div>
                <div class="profile-info">
                    <h2>{{ $user->fullname }}</h2>
                    <p class="profile-role">Food Innovator</p>
                </div>
                <div class="profile-stats">
                    <div class="stat-item"><span class="stat-number">{{ $user->recipes_count ?? 353 }}</span> Recipes</div>
                    <div class="stat-item"><span class="stat-number">{{ $user->views_count ?? 12 }}</span> Views</div>
                    <div class="stat-item"><span class="stat-number">{{ $user->followers_count ?? 1.4 }}</span> Followers
                    </div>
                </div>
            </div>
<!-- Recipes Section -->
            <div class="profile-posts">
                <div class="post-category">
                    <a href="#" class="category-btn">Recipes</a>
                    <div class="category-content">
                        @if($posts->isEmpty())
                            <p>You haven't created any recipes yet.</p>
                        @else
                            @foreach($posts as $post)
                                <div class="recipe-card">
                                    <div class="recipe-image">
                                        <img src="{{ $post->image ? asset($post->image) : asset('images/default.jpg') }}" alt="{{ $post->title }}" class="post-img">
                                    </div>
                                    <div class="recipe-details">
                                        <h4 class="recipe-title">{{ $post->title }}</h4>
                                        <div class="recipe-ingredients">
                                            <!-- Parse ingredients from content or use a dedicated field -->
                                            @if($post->ingredients)
                                                <p>{{ $post->ingredients }}</p>
                                            @else
                                                <p>No ingredients available.</p>
                                            @endif
                                        </div>
                                        <div class="recipe-tags">
                                            @forelse($post->tags as $tag)
                                                <span class="tag">{{ $tag->name }}</span>
                                            @empty
                                                <span class="tag">No tags</span>
                                            @endforelse
                                        </div>
                                        <div class="recipe-actions">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn-edit">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Delete</button>
                                            </form>
                                        </div>
                                        <div class="recipe-meta">
                                            <small>Created at: {{ $post->created_at->format('Y-m-d H:i') }}</small>
                                            <small>Updated at: {{ $post->updated_at->format('Y-m-d H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Create Recipe Button -->
            {{-- <a href="{{ route('recipes.create') }}" class="create-btn">Create a recipe</a> --}}
        </div>
    </div>
@endsection
