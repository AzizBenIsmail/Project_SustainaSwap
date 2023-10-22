@extends('layouts.admin')
@section('content')

<h1>Comment management</h1>

<div class="card">
    <div class="card-body">
        @if (session()->has('success'))
        <div class="mt-4 alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ADD COMMENT</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('comments.storeFromAdmin') }}" method="POST">
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
            
                    <button type="submit" class="btn btn-primary mt-1" style="background-color: #FC6F00; width: 100%; border: none;">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
      
            </div>
          </div>
        </div>
      </div>
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

                            <div class="post-actions">
                                <button class="btn btn-secondary action-btn" style="width: 100px;">Actions</button>
                                <div class="action-menu" id="action-menu-{{$comment->id}}" style="display: none;">
                                    <a href="{{ route('comments.editFromAdmin', $comment->id) }}" class="btn btn-info action-item" style="width: 100px; color: white;">Edit</a>
                                    <button class="btn btn-danger action-item delete-comment" data-comment-id="{{$comment->id}}" style="width: 100px; color: white;">Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-body text-center" >
                <h2 class="mb-3 mt-3" style="font-size: 50px; ">Comments Analysis</h2>
        
                <h1 style="font-size: 36px;" >Most Commented Post:</h1>
                @if ($mostCommentedPost)
                <p style="font-size: 24px ;">Post's Title: </p>
                <p style="font-size: 24px; color: blue;"> {{ $mostCommentedPost->title }}</p>
                <p style="font-size: 24px;">Number of Comments: </p>
                    <p style="font-size: 24px; color: blue;">{{ $mostCommentedPost->comments->count() }}</p>
                
                @else
                <p>No comments available.</p>
                @endif
        
                <h1 >
                    <span style="font-size: 30px; margin-right: 10px;">Most Repeated Word is </span>
                    <span style="font-size: 50px; color: red; margin-right: 10px;">{{ $mostRepeatedWord }}</span>
                </h1>
                
            </div>
        </div>

    </div>
</div>
<form id="delete-comment-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    const actionButtons = document.querySelectorAll('.action-btn');
    const actionMenus = document.querySelectorAll('.action-menu');

    actionButtons.forEach((btn, index) => {
        const actionMenu = actionMenus[index];
        actionMenu.style.display = 'none'; 
        btn.addEventListener('click', () => {
            actionMenu.style.display = actionMenu.style.display === 'block' ? 'none' : 'block';
        });
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('delete-comment')) {
            e.preventDefault();
            const commentId = e.target.getAttribute('data-comment-id');
  
   
                const deleteForm = document.getElementById('delete-comment-form');
                deleteForm.action = `/admin/commentDelete/${commentId}`;
                deleteForm.submit();
            
        }
    });
</script>
@endsection