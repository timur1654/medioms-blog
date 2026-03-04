@extends('layouts.app')

@section('title', 'Все посты')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Все посты</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Создать новый пост</a>
    </div>

    @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body" style="max-height: 225px">
                            <h5 class="card-title"><a
                                    href="{{route('admin.posts.show', $post)}}">{{ Str::limit($post->title, 60)}}</a></h5>
                            <p class="card-text">{{ Str::limit($post->excerpt, 80) }}</p>
                            <small class="text-muted">{{ $post->created_at?->format('M d, Y') }}</small>

                            <div class="mt-3">
                                <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info btn-sm">Смотреть</a>
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                   class="btn btn-warning btn-sm">Редактировать</a>

                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    @else
        <div class="alert alert-info">
            No posts found. <a href="{{ route('posts.create') }}">Create your first post</a>
        </div>
    @endif
@endsection


