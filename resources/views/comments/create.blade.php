@extends('layouts.app')

@section('content')
@include('basic component.head')
@include('basic component.navbar')
<div class="container">
    <h1>Create Comment</h1>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="text">Comment:</label>
            <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="post_id">Select Post:</label>
            <select class="form-control" id="post_id" name="post_id" required>
                @foreach($posts as $post)
                <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
