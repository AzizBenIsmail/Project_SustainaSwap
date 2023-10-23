<div class="right message" id={{$messageId}}> 
    <form action="{{ route('deleteMessages', ['id' => $messageId]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
        @csrf
        @method('delete')
    <p>{{ $message}}</p>
    <button type="submit" >🗑️</button>
</form>
</div>






