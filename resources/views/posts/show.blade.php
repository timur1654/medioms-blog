@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <a href="{{route('blog.index')}}">Назад к постам</a>

                <div style="margin-top: 10px;">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->published_at?->format('d.m.Y')}}</p>
                </div>

                <div>{!! nl2br(e($post->body)) !!}</div>

                <div class="mt-4"></div>
            </div>
        </div>
    </div>
@endsection
