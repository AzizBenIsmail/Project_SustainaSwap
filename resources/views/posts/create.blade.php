@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
@include('basic component.head')
@include('basic component.navbar')
<div class="container mt-5 py-2 mb-2" style="background-color: #F0F8FF;width: 54%;">
    @if (session()->has('success'))
    <div class="mt-4 alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    <h5 class="mt-3 mb-1" style="color: #FC6F00;">Create New Post</h5>
    @if($errors->any())
        <div class="alert alert-danger">
           <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">
                        {{$error}}
                </li>
            @endforeach
           </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" >Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="center justify">
            <button type="submit" class="btn btn-primary mb-5 px-5" style="background-color: #FC6F00; width: 100%; border: none; ">Create Post</button>
        </div>
        
    </form>
</div>
@yield('posts')
@endsection
