@extends('layouts.master')
@section('content')

    <!-- Single Post Section Begin -->
    <section class="single-post spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__content">
                        <div class="single-post__hero">
                            <img src="{{ asset($post->image ?? 'img/food/default.jpg') }}" alt="{{ $post->title }}" class="img-fluid">
                        </div>
                        <div class="single-post__top__text">
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                    <div class="single-post__title">
                        <div class="single-post__title__meta">
                            <h2>{{ $post->created_at->format('d') }}</h2>
                            <span>{{ $post->created_at->format('M') }}</span>
                        </div>
                        <div class="single-post__title__text">
                            <ul class="label">
                                @foreach ($post->tags as $tag)
                                    <li>{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                            <h4>{{ $post->title }}</h4>
                            <ul class="widget">
                                <li>by {{ $post->user->username }}</li>
                                <li>{{ $post->reading_time }} min read</li>
                                <li>{{ $post->comments->count() }} Comments</li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-post__social__item">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>

                    <!-- Comments Section -->
                    <div class="single-post__comment">
                        <div class="widget__title">
                            <h4>{{ $post->comments->count() }} Comments</h4>
                        </div>
                        @forelse ($post->comments as $comment)
                            <div class="single-post__comment__item">
                                <div class="single-post__comment__item__pic">
                                    <img src="img/categories/single-post/comment/comment-1.jpg" alt="">
                                </div>
                                <div class="single-post__comment__item__text">
                                    <h5>{{ $comment->user ? $comment->user->username : $comment->name }}</h5>
                                    <span>{{ $comment->created_at->format('d M Y') }}</span>
                                    <p>{{ $comment->content }}</p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <p>No comments yet.</p>
                        @endforelse
                    </div>

                    <!-- Leave a Comment Form -->
                    <div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Leave a comment</h4>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="input-list">
                                @guest
                                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endguest
                            </div>
                            <textarea name="content" placeholder="Message" required>{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Post Section End -->

@endsection