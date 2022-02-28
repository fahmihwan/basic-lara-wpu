@extends('layout/layout')
@section('container')


<h1 class="mb-5">{{$post->title}}</h1>

<p>By. Fahmi in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>

{{$post->body}}

<a href="/posts">Back</a>
@endsection