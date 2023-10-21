<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')
<div class="chat">

  <!-- Header -->
  <div class="top">
    <img src="{{ asset('images/user.jpg')}}" alt="Avatar" height="80px" width="80px">
    <div>
      <p>{{ Auth::user()->name }}</p>
      <small>Online</small>
    </div>

  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="messages">
    @include('receive', ['message' => "Hey! What's up!  👋"])
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
</main>

@include('basic component.footer')


@include('basic component.JAVASCRIPT_FILES')


</body>
</html>
