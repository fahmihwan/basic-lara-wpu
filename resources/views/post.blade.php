@extends('layout/layout')
@section('container')


<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{$post->title}}</h1>

            <p>By. <a href="/authors/{{$post->author->username}}">{{ $post->author->name}}</a> in <a href="/categories/$post->category->slug }}">{{$post->category->name}}</a></p>

            @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{$post->category->name}}" class="img-fluid  ">
            @else
            <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid ">
            @endif
            <article class="my-3 ">
                {!!$post->body!!}
            </article>
            <a href="/posts">Back</a>
        </div>
    </div>
</div>



@endsection