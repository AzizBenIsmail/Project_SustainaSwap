<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = @json($events);
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: events,
          
        });
        calendar.render();
      });

    </script>
  </head>
  @extends('layouts.app')

@section('content')
@include('basic component.head')
@include('basic component.navbar')
<header class="site-header section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h1>
                        <span class="d-block text-primary">All</span>
                        <span class="d-block text-dark">Trades</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>
<br>
  <body>
    
    <div id='calendar' ></div>
  </body>
  @include('basic component.footer')
@endsection

@include('basic component.JAVASCRIPT_FILES')

</html>
