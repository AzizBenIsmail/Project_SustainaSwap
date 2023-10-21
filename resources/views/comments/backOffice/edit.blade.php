@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Edit Comment</h1>

    <form action="{{ route('comments.updateFromAdmin', $comment->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- or @method('PATCH') -->

        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">

        <div class="form-group">
            <label for="text">Comment:</label>
            <textarea class="form-control" id="text" name="text" rows="4" required>{{ $comment->text }}</textarea>
        </div>

        <button type="submit" class="btn btn-secondary mt-1" style=" width: 100%; border: none;">Update</button>
    </form>
</div>

@endsection