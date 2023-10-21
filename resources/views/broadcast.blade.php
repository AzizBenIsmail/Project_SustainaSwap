{{-- @foreach ($messages as $message) --}}
{{-- <div class="right message">
    @foreach ($messages as $message)
        <form action="{{ route('pusher.destroy', ['message' => $message]) }}" method="POST" style="display: inline;">
            @csrf
            @method('delete')
            <p>{{ $message->message }}</p>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    @endforeach
</div> --}}



<div class="right message"> 
    <form >
        @csrf
        @method('delete')
    <p>{{ $message}}</p>
    <p>{{$message_id}}</p>
    <button type="submit" >🗑️</button>
</form>
</div>


{{-- @endforeach --}}
{{-- <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Profile picture"> --}}
{{-- <script>
    $(document).ready(function () {
        $('.delete-message').on('click', function (event) {
            event.preventDefault(); // Prevent the link from navigating

            if (confirm('Are you sure you want to delete this message?')) {
                // If the user confirms, proceed with the deletion
                window.location.href = $(this).attr('href');
            }
        });
    });
</script> --}}
