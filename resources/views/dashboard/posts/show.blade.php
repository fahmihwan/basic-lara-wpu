@extends('dashboard.layouts.main')

@section('container')

<!-- white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis; -->
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8 border" ">
            <h1 class=" mb-3">{{$post->title}}</h1>

            <a href="/dashboard/posts" class="btn btn-success "> <i class="bi bi-arrow-left" style="font-size: 1rem;"></i> </span> Back to my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning "> <i class="bi bi-pencil-square" style="font-size: 1rem;"></i> Edit</a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onClick="return confirm('Are you sure?')">
                    <i style="font-size: 1rem;" class=" bi bi-trash"></i> Delete
                </button>
            </form>

            @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{$post->category->name}}" class="img-fluid mt-3 ">
            @else
            <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid mt-3 ">
            @endif
            <article class="my-3" style="overflow: hidden">
                {!!$post->body!!}
            </article>
        </div>
    </div>
</div>
@endsection