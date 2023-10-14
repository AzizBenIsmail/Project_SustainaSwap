@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->
@section('content')
@include('basic component.head')
@include('basic component.navbar')
    <div class="container">
        <div class="card mt-4 mb-4" style="background-color: #F0F8FF;">
       

            <div class="card-body mt-4" >
                <div class="row mt-4">
                    <div class="col-md-9 mt-4" >
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
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-5">
                        <small class="" style="color: #00345E;">
                            Posted by:  <span style="color: #FF4400;">{{ $post->user->name }}</span> on <span style="color: #FF4400;">{{ $post->created_at->format('M d, Y H:i:s') }}</span>
                        </small>
    
                        
                    </div>
                    <div class="col-md-7">
                        <a href="#commentsCollapse-{{ $post->id }}" data-toggle="collapse"><small>Comments: {{ $post->comments_count }}</small></a>
                    </div>
                    
                </div>
                
                <!-- Collapsible Comments Section -->
                <div id="commentsCollapse-{{ $post->id }}" class="collapse">
                    @php
                        $comments = $post->comments
                    @endphp
    
                    @foreach ($comments as $comment)
                    <hr>
                    <div class="row mb-1">
                        <div class="card-body">
                            <small class="card-text">{{ $comment->text }}</small>
                        </div>
                        <div class="card-footer">
                            <small style="color: #00345E;">Commented by: <span style="color: #FF4400;">{{ $comment->user->name }}</span> on  <span style="color: #FF4400;">{{ $comment->created_at->format('M d, Y H:i:s') }}</span>
                            </small>
                        </div>
                    </div>
                    @endforeach
            
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