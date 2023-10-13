@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->
@section('content')
@include('basic component.head')
@include('basic component.navbar')
    <div class="container">
    <h1>Post :</h1>
    <div class="card mb-3">
        <a href="/post/{{$post->id}}">
        @if($post->image_url)
        <img src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="Post Image">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Posted by: {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small>
        </div>
    </a>
    </div>
</div>
@endsection