@extends('layouts.admin')
@section('content')
@if(session('admin_message'))
    <div class="alert alert-info">
        {{ session('admin_message') }}
    </div>
@endif
<h1>Messages management</h1>

<div class="card">

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
                <form method="POST" action="{{ route('pusher.chatAdminSend') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" rows="4">
                    </div>
    
                    <div class="mb-3">
                        <label for="content" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" rows="4">
                    </div>
    
                    <div class="mb-3">
                        <label for="content" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" rows="4">
                    </div>
    
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                    </div>
                    
                    <div class="center justify">
                        <button type="submit" class="btn btn-primary mb-2 px-5" style="background-color: #FC6F00; width: 100%; border: none; ">Send Message</button>
                        <button type="button" class="btn btn-secondary px-5"  style="width: 100%; border: none; " data-dismiss="modal">Close</button>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
      
            </div>
          </div>
        </div>
      </div>
    <div class="card-body">

       
        <h5 class="card-title">Basic Datatable</h5>

        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <td>Item</td>
                        <th>Message</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($messages as $message)


                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->name}}</td>
                        <td>{{$message->product_name}}</td>

                        
                        <td>{{$message->content}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->created_at}}</td>
                        <td>
                            <form action="{{ route('deleteMessage', ['id' => $message->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br>
                            
                            

                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>

    </div>
</div>


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
  modal.find('.modal-title').text('New message')
})
</script>
@endsection