<!-- resources/views/admin_chat/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Message</h1>
    <form action="{{ route('adminChat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
