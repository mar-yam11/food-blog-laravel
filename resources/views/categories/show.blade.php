@extends('layouts.master')
@section('content')
    <section class="categories categories-grid spad">
        <div class="container">
            <div class="breadcrumb__text">
                <h2>Categories: <span>{{ $category->name ?? 'Unknown Category' }}</span></h2>
                <div class="breadcrumb__option">
                    <a href="/">Home</a>
                    <a href="{{ route('categories.index') }}">Categories</a>
                    <span>{{ $category->name ?? 'Unknown Category' }}</span>
                </div>
            </div>
            @forelse ($posts as $post)
                <div class="categories__list__post__item">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="categories__post__item__pic">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="post__image">
                                <div class="post__meta">
                                    <h4>{{ $post->created_at->format('d') }}</h4>
                                    <span>{{ $post->created_at->format('M') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="categories__post__item__text">
                                <span class="post__label">{{ $category->name ?? 'Uncategorized' }}</span>
                                <ul class="post__label--large">
                                    @foreach ($post->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                                <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <ul class="post__widget">
                                    <li>by <span>{{ $post->user->username }}</span></li>
                                    <li>{{ $post->reading_time }} min read</li>
                                    <li>{{ $post->comments->count() }} {{ Str::plural('Comment', $post->comments->count()) }}</li>
                                </ul>
                                <p>{{ Str::limit($post->content, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posts found in this category.</p>
            @endforelse
            {{ $posts->links() }}
        </div>
    </section>
@endsection