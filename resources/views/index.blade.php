<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chat Laravel Pusher | Edlin App</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
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
        <img src="{{ asset('uploads/' . $item->picture) }}" alt="Avatar" height="80px" width="80px">
        <div class="user-info">
            <div class="user-names">
                <p>{{ $item->user->name }}</p>
                <p><small>Online</small></p>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Chat -->
    <div class="messages">
        @include('receive', ['message' => "Hey! What's up! 👋"])
        @include('receive', ['message' => "Ask a friend to open this link and you can chat with them!"])
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

<script>
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
    const channel = pusher.subscribe('public');

    //Receive messages
    channel.bind('chat', function (data) {
        $.post("/receive", {
            _token:  '{{csrf_token()}}',
            message: data.message,
        })
            .done(function (res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            });
    }
</script>

</html>
