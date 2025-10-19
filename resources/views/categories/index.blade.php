@extends('layouts.master')
@section('content')
    <section class="categories spad">
        <div class="container">
            <div class="breadcrumb__text">
                <h2>All Categories</h2>
                <div class="breadcrumb__option">
                    <a href="/">Home</a>
                    <span>Categories</span>
                </div>
            </div>
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="category__item">
                            <h4><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></h4>
                        </div>
                    </div>
                @empty
                    <p>No categories found.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection