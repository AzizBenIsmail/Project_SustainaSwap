 {{-- <div class="right message">
        <form action="{{ route('pusher.destroy', ['message' => $message]) }}" method="POST" style="display: inline;">
            @csrf
            @method('delete')
            <p>{{ $message}}</p>
            <p>{{$message_id}}</p>
            <button type="submit" >🗑️</button>
        </form>
</div> --}}



<div class="right message" id={{$messageId}}> 
    <form action="{{ route('deleteMessage', ['id' => $messageId]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
        @csrf
        @method('delete')
    <p>{{ $message}}</p>
    
    <button type="submit" >🗑️</button>
</form>
</div>

<script>
    function deleteMessage(messageId) {
        const confirmation = confirm("Are you sure you want to delete this message?");
        
        if (confirmation) {
            const messageElement = document.getElementById(messageId);
            if (messageElement) {
                messageElement.remove();
            }
        }
    }
</script>




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
