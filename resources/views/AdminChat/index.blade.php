<!-- resources/views/admin_chat/index.blade.php -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Message</button>

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
