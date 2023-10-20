@extends('layouts.admin')
@section('content')

<h1>Post management</h1>


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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ADD POST</button>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('posts.storeToAdmin') }}" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-primary mb-2 px-5" style="background-color: #FC6F00; width: 100%; border: none; ">Create Post</button>
                            <button type="button" class="btn btn-secondary px-5"  style="width: 100%; border: none; " data-dismiss="modal">Close</button>
                        </div>
                        
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
                            <div class="post-actions">
                                <button class="btn btn-secondary action-btn" style="width: 100px;">Actions</button>
                                <div class="action-menu" id="action-menu-{{$post->id}}" style="display: none;">
                                    <a href="{{ route('posts.editToAdmin', $post->id) }}" class="btn btn-info action-item" style="width: 100px; color: white;">Edit</a>
                                    <button class="btn btn-danger action-item delete-post" data-post-id="{{$post->id}}" style="width: 100px; color: white;">Delete</button>
                                </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

const actionButtons = document.querySelectorAll('.action-btn');
    const actionMenus = document.querySelectorAll('.action-menu');

    actionButtons.forEach((btn, index) => {
        const actionMenu = actionMenus[index];
        actionMenu.style.display = 'none'; // Hide the menu initially

        btn.addEventListener('click', () => {
            actionMenu.style.display = actionMenu.style.display === 'block' ? 'none' : 'block';
        });
    });
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('delete-post')) {
            e.preventDefault();
            const postId = e.target.getAttribute('data-post-id');
   
                const deleteForm = document.getElementById('delete-post-form');
                deleteForm.action = `/admin/posts/${postId}`;
                deleteForm.submit();
            
        }
    });

    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.modal-title').text('New post' )
})
</script>
@endsection
