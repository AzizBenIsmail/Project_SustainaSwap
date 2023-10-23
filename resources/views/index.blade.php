<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sustaina Swap Chat</title>
    <link rel="icon" src="{{ asset('back_office/assets/images/logo-icon.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- End JavaScript -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link href="{{ asset('css/tooplate-little-fashion.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- End CSS -->
    <style>
        .top {
            display: flex;
            align-items: center;
        }

        img {
            margin-right: 10px; /* Espace entre l'image et les éléments à droite */
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-names {
            display: flex;
            justify-content: space-between;
        }

        .user-names p:last-child {
            margin-left: auto; /* Pousse le dernier paragraphe (Auth::user()->name) à l'extrême droite */
        }
    </style>
</head>

<body>
@include('basic component.navbar')

<div class="chat">

    <!-- Header -->
    <div class="top">
      <div class="user-info">
          <img src="{{ asset('uploads/' . $item->picture) }}" alt="Avatar" height="200px" width="200px">
          <div class="user-names">
              <p>{{ $item->user->name }}</p>  <!-- receiver -->
              <span style="color: green; font-weight: bold;">Online</span>              
              <li class="my-paragraph">{{ $item->title }}</li>
              <li class="my-paragraph">{{ $item->description }}</li>
              <li class="my-paragraph">{{ $item->state }}</li>
          </div>
      </div>
  </div>
  
    <!-- End Header -->

    <!-- Chat -->
    <div class="messages">
        @include('receive', ['message' => "Hey! What's up! 👋"])
        
    </div>
    <!-- End Chat -->

    <!-- Footer -->
    <div class="bottom">
        <form>
            <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
            <button type="submit"></button>
        </form>
    </div>
    <!-- End Footer -->

</div>
@include('basic component.footer')

</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // JavaScript function to show a notification
    
    function showAdminMessageNotification(message) {
    console.log("showAdminMessageNotification called with message: " + message);

    Swal.fire({
      title: 'New Message from Admin',
      text: message,
      icon: 'info',
      confirmButtonText: 'OK'
    });
  }

  // Call this function when an admin sends a message
  // You can pass the message content as an argument
  showAdminMessageNotification('{{ $messageContent }}'); --}}
{{-- </script> --}}
<script>
  const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
  const channel = pusher.subscribe('public');

  //Receive messages
  channel.bind('chat', function (data) {
    $.post("/receive", {
      _token:  '{{csrf_token()}}',
      message: data.message ,
      
    })
     .done(function (res) {
       $(".messages > .message").last().after(res);
       $(document).scrollTop($(document).height());
     });
  });
  function generateUniqueMessageID() {
    // You can use a timestamp, a random string, or any method to generate a unique ID
    return Date.now() + Math.random().toString(36).substring(7);
}

  //Broadcast messages
  $("form").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url:     "/broadcast",
      method:  'POST',
      headers: {
        'X-Socket-Id': pusher.connection.socket_id
      },
      data:    {
        _token:  '{{csrf_token()}}',
        message: $("form #message").val(),
        // message_id: generateUniqueMessageID(),
  }
    }).done(function (res) {
      $(".messages > .message").last().after(res);
      $("form #message").val('');
      $(document).scrollTop($(document).height());
    });
    // console.log(generateUniqueMessageID());

  });


</script>

</html>
