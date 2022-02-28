@extends('layout/layout')

@section('container')
<h1>Halaman Blog Posts</h1>

@foreach($posts as $post)
<article class="mb-5  border-bottom pb-4">
    <h5>
        <a href="/post/{{$post->slug}}" class="text-decoration-none">
            {{ $post->title }} <!-- lorem ipsum pertama -->
        </a>
    </h5>
    <p>By. Fahmi in <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a></p>
    <p>{{$post->excerpt}}</p>
    <p>{{$post->body}}</p>

    <a href="/posts/{{$post->slug}}">Read more...</a>
</article>
@endforeach


@endsection