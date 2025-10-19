@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea name="ingredients" class="form-control">{{ json_encode($post->ingredients) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="directions" class="form-label">Directions</label>
            <textarea name="directions" class="form-control">{{ json_encode($post->directions) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="serves" class="form-label">Serves</label>
            <input type="text" name="serves" value="{{ $post->serves }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="prep_time" class="form-label">Preparation Time</label>
            <input type="text" name="prep_time" value="{{ $post->prep_time }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cook_time" class="form-label">Cooking Time</label>
            <input type="text" name="cook_time" value="{{ $post->cook_time }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" width="150" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Post</button>
    </form>
</div>
@endsection
