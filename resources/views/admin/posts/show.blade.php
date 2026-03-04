@extends('layouts.app')

@section('title', $post->slug)

@section('content')
    <div class="card">
        <div class="card-body">
            <div>

            </div>
            <h1 class="card-title">{{ $post->title }}</h1>
            <small class="text-muted">Published on {{ $post->created_at->format('M d, Y') }}</small>

            <div class="mt-4">
                <p class="card-text">{{ $post->body }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to Posts</a>

                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete Post
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
