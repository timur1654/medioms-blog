@extends('layouts.app')

@section('title', 'Все посты')

@section('content')

    <form action="{{route('blog.index')}}" method="get" class="d-flex justify-content-center mb-4">
        @csrf
        <input type="text" placeholder="Поиск по названию или тексту" name="q" value="{{request('q')}}" class="form-control">
        <button class="btn btn-primary">Найти</button>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Все посты</h2>
    </div>

    @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            @if($post->image)
                                <div>
                                    <img src="{{ $post->image_url }}" alt="{{$post->title}}">
                                </div>
                            @endif
                            <h5 class="card-title"><a href="{{route('blog.show', $post)}}">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                            <small class="text-muted">{{ $post->published_at?->format('M d, Y') }}</small>

                            <div class="mt-3">
                                <a href="{{ route('blog.show', $post) }}">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <div class="alert alert-info">
            No posts found. <a href="{{ route('admin.posts.create') }}">Create your first post</a>
        </div>
    @endif

    @if($posts->hasPages())
        {{ $posts->onEachSide(1)->links('components.pagination') }}
    @endif
@endsection



