@extends('layouts.app') 

@section('content')
@include('basic component.head')
@include('basic component.navbar')
<div class="container">
    <h1>Comments</h1>

    @foreach($comments as $comment)
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $comment->text }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Commented by: {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</small>
        </div>
    </div>
    @endforeach

</div>
@endsection
