@extends('layouts.admin')
@section('content')

<h1>Comment management</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>text</th>
                        <th>post</th>
                        <th>user</th>
                        <th>created at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($comments as $comment)


                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->text}}</td>
                        <td>{{$comment->post->content}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger delete-post" data-post-id="{{$comment->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection