@extends('layouts.app')

@section('title', 'Edit Post - CRUD Laravel 12')

@section('content')
    <h2>Edit Post</h2>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Изображение</label>
            <input type="file" class="form-control" accept="image/*" name="image">
            @error('image')<p class="text-danger">{{$message}}</p>@enderror
        </div>

        @if(isset($post) && $post->image)
            <div class="mb3">
                <p>Текущие изображение</p>
                <img src="{{$post->image_url}}" alt="">
                <label>
                    <input type="checkbox" name="remove_image" value="1">
                    Удалить изображение
                </label>
            </div>
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
            @error('title')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" maxlength="100">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="body" rows="8">{{ old('body', $post->body) }}</textarea>
            @error('body')<p class="text-danger">{{$message}}</p>@enderror
        </div>

        <button type="submit" class="btn btn-success">Update Post</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
