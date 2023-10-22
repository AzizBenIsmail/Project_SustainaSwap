<!-- resources/views/admin_chat/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Messages</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                {{ $message->name }}: {{ $message->content }}
                <a href="{{ route('adminChat.edit', ['id' => $message->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('adminChat.destroy', ['id' => $message->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
