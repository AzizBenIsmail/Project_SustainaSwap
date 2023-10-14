@extends('posts.create') <!-- Assuming you have a layout file, adjust as needed -->
@section('posts')

<div class="container" style="width: 55%;">
    @foreach($posts as $post)
    <div class="card mb-4" style="background-color: #F0F8FF;">
       

        <div class="card-body" >
            <div class="row">
                <div class="col-md-9" >
                    <h5 class="card-title" style="color: #00345E;">{{ $post->title }}</h5>
                </div>
                @if ($post->user->id == 1)

                <div class="col-md-1">
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-info text-white py-1 px-4">edit</a>
                </div>
                <div class="col-md-2">
                    <a  class="btn btn-danger text-white py-1 px-3 mx-4" onclick="handleDelete({{$post->id}})">delete</a>
                </div>
                @endif
            </div>
            <a href="/post/{{$post->id}}">
            <p class="card-text"  style="color: black;">{{ $post->content }}</p>
        </div>
        @if($post->image_url)
        <div class="text-center mb-3"  >
            <img src="{{ asset('storage/' . $post->image_url) }}" class="img-fluid" alt="Post Image">
        </div>
        @endif
        <div class="card-footer px-2">
            <div class="row">
                <div class="col-md-5">
                    <small class="" style="color: #00345E;">
                        Posted by:  <span style="color: #FF4400;">{{ $post->user->name }}</span> on <span style="color: #FF4400;">{{ $post->created_at->format('M d, Y H:i:s')}}</span>
                    </small>

                    
                    
                </div>
                <div class="col-md-7">
                    <a href="#commentsCollapse-{{ $post->id }}" data-toggle="collapse"><small>Comments: {{ $post->comments_count }}</small></a>
                </div>
            </div>
            
            <!-- Collapsible Comments Section -->
            <div id="commentsCollapse-{{ $post->id }}" class="collapse">
                @php
                    $comments = $post->comments->take(-2)->reverse();
                    $remainingCommentsCount = $post->comments_count - count($comments);
                @endphp

                @foreach ($comments as $comment)
                <hr>
                <div class="row mb-1 ">
                    <div class="card-body row"">
                        <small class="card-text col-md-9">{{ $comment->text }}</small>
                        @if ($comment->user->id == 1)

                        <div class="col-md-1">
                            <a href="{{ route('comments.edit', ['comment' => $comment]) }}" class="btn btn-info text-white py-1 px-4">edit</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white py-1 px-3 mx-4" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <small style="color: #00345E;">Commented by: <span style="color: #FF4400;">{{ $comment->user->name }}</span> on  <span style="color: #FF4400;">{{ $comment->created_at->format('M d, Y H:i:s') }}</span>
                        </small>
                    </div>
                </div>
                @endforeach
        
                @if ($remainingCommentsCount > 0)
                <hr>
                <div class="text-center">
                    <a href="/post/{{$post->id}}">View {{ $remainingCommentsCount }} more comments</a>
                </div>
                @endif
                <hr>
                <div class="container">
                
                    <form action="{{ route('comments.storePost') }}" method="POST">
                        @csrf
                
                        <div class="form-group">
                            <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                        </div>
                
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
    
                
                        <button type="submit" class="btn btn-primary mt-1" style="background-color: #FC6F00; width: 100%; border: none;">Comment</button>


                    </form>
                </div>
            </div>

        </div>
        
        
        
    </a>
    </div>
    @endforeach


    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="deletePostForm">
                @csrf
                @method('DELETE')
          <div class="modal-content" >
            <div class="row" style="height: 60px !important;">
                <h5 class="modal-title col-md-11 mt-3" id="deleteModelLabel">Delete Post</h5>
                <button type="button" class="close col-md-1 bg-transparent " data-dismiss="modal" aria-label="Close" style="border: none; font-size: 24px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                
                
            </div>
            
            <div class="modal-body">
          Are you sure you want to delete this post ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </div>
        </form>
        </div>
      </div>


      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
      <script>
function handleDelete(id){

var form=document.getElementById('deletePostForm')
form.action='/posts/'+id
$('#deleteModel').modal('show'); 

}


      </script>

</div>
@endsection
