@extends('layout/layout')

@section('container')
<h1>{{ $title  }}</h1>

@foreach($posts as $post)
<article class="mb-5  border-bottom pb-4">
    <h5>
        <a href="/post/{{$post->slug}}" class="text-decoration-none">
            {{ $post->title }}
        </a>
    </h5>
    <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name  }}</a> in <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a></p>
    <p>{{$post->excerpt}}</p>
    <p>{{$post->body}}</p>

    <a href="/posts/{{$post->slug}}">Read more...</a>
</article>
@endforeach


@endsection