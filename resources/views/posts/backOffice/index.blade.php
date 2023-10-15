@extends('layouts.admin')
@section('content')

<h1>Post management</h1>


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>content</th>
                        <th>image</th>
                        <th>user</th>
                        <th>created at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($posts as $post)


                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->image_url}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger delete-post" data-post-id="{{$post->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>

    </div>
</div>
<form id="delete-post-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('delete-post')) {
            e.preventDefault();
            const postId = e.target.getAttribute('data-post-id');
            if (confirm('Are you sure you want to delete this post?')) {
                const deleteForm = document.getElementById('delete-post-form');
                deleteForm.action = `/admin/posts/${postId}`;
                deleteForm.submit();
            }
        }
    });
</script>
@endsection
