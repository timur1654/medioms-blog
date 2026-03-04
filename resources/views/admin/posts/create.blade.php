@extends('layouts.app')

@section('title', 'Create Post - CRUD Laravel 12')

@section('content')
    <h2>Create New Post</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Изображение</label>
            <input type="file" class="form-control" accept="image/*" name="image">
            @error('image')<p class="text-danger">{{$message}}</p>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @error('title')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
            @error('slug')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" maxlength="100">{{ old('excerpt') }}</textarea>
            @error('excerpt')<p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
            @error('body')<p class="text-danger">{{$message}}</p>@enderror
        </div>

        <button type="submit" class="btn btn-success">Создать пост</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Назад</a>
    </form>
@endsection
