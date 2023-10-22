<!-- resources/views/admin_chat/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Message</h1>
    <form action="{{ route('adminChat.update', ['id' => $message->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="4">{{ $message->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
