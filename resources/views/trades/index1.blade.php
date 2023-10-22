

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
    
   <br> <form method="GET" action="{{ route('trades.search', ['search' => 'pending']) }}">
    <input type="text" name="search" placeholder="Search..." style="margin-left: 20px; padding-left: 10px;">
 
    <button type="submit" style="background-color: #F4A460; color: #fff; margin-left: 20px; padding-left: 10px;">Search</button>  <a href="/calendarr" class="btn btn-primary" style="background-color: #F4A460; color: #fff; margin-left: 1100px; padding-left: 10px;">View Calendar</a>
    <div class="text-left">
       
    </div>
</form>






    <div class="row mt-4">
        @foreach ($trades as $trade)
            <div class="col-md-4 mb-3">
            <div class="card" style="background-color: #FFF5EE; color: #fff; border-radius: 10px; margin-left: 20px; padding-left: 10px;">             
                   <div class="card-body">
                        <p class="card-text">Start Date: {{ $trade->tradeStartDate  }}</p> 
                        <p class="card-text">End Date: {{ $trade->tradeEndDate  }}</p> 
                        <p class="card-text">Status: {{ $trade->status }}</p>
                        <p class="card-text">Offered Item: {{ $trade->offeredItem->title }}</p>
                       
                        <div class="mt-3">
                        <a href="{{ route('trades.show', $trade->id) }}" class="btn btn-info" style="background-color: #F4A460; color: #fff; display: inline;">Afficher</a>
                        <form action="{{ route('trades.accept', $trade) }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" style="background-color: #FF7F50;color: #fff;" >Accept Trade</button>
                        </form>
                        <form action="{{ route('trades.reject', $trade) }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" style="background-color: #FF7F50;color: #fff;">Reject Trade</button>
                        </form>   
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br><br>  <br><br>   <br><br>   <br><br>
    @include('basic component.footer')
@endsection

@include('basic component.JAVASCRIPT_FILES')
