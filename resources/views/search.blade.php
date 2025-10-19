@extends('layouts.master')
     @section('content')
         <section class="categories categories-grid spad">
             <div class="container">
                 <div class="breadcrumb__text">
                     <h2>Search Results for: <span>{{ $query }}</span></h2>
                     <div class="breadcrumb__option">
                         <a href="{{ route('home') }}">Home</a>
                         <span>Search</span>
                     </div>
                 </div>
                 @forelse ($posts as $post)
                     <div class="categories__list__post__item">
                         <div class="row">
                             <div class="col-lg-6 col-md-6">
                                 <div class="categories__post__item__pic">
                                     <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                     <div class="post__meta">
                                         <h4>{{ $post->created_at->format('d') }}</h4>
                                         <span>{{ $post->created_at->format('M') }}</span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6">
                                 <div class="categories__post__item__text">
                                     <span class="post__label">{{ $post->category->name }}</span>
                                     <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                                     <ul class="post__widget">
                                         <li>by <span>{{ $post->user->username }}</span></li>
                                         <li>{{ $post->reading_time }} min read</li>
                                         <li>{{ $post->comments->count() }} Comments</li>
                                     </ul>
                                     <p>{{ Str::limit($post->content, 100) }}</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @empty
                     <p>No posts found for "{{ $query }}".</p>
                 @endforelse
                 {{ $posts->links() }}
             </div>
         </section>
     @endsection