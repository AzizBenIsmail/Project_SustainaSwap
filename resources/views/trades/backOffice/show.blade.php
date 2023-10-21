@extends('layouts.admin')

@section('content')

    <h1>Trade Details</h1>

    <div class="container mt-12">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 mt-6">
                <div class="col-lg-12 col-12">
                    <div class="product-thumb">
                        <!-- Display the trade's picture, if available -->
                        <img src="{{ asset('uploads/' . $trade->picture) }}"
                             class="img-fluid product-image" alt="">
                    </div>
                </div>
                <br>
                <div>
                <h3>  <strong>Trade Start Date:</strong> {{ $trade->tradeStartDate }}  </h3>
                </div>
                <br>
                <div>
                   <h3> <strong>Trade End Date:</strong> {{ $trade->tradeEndDate }}</h3>
                </div>
                <br>
                <div>
                <h3> <strong>Status:</strong> {{ $trade->status }}  </h3>
                </div>
                <br>
                <div>
                    <!-- Display the owner's name -->
                    <h3> <strong>Owner:</strong> {{ $trade->owner->name }}  </h3>
                </div>
                <br>
                <div>
                    <!-- Display the offered item's title -->
                    <h3>   <strong>Offered Item:</strong> {{ $trade->offeredItem->title }}  </h3>
                </div>
                <br>
                <div>
                    <!-- Display the requested item's title -->
                    <h3> <strong>Requested Item:</strong> {{ $trade->requestedItem->title }}  </h3>
                </div>
                <br>
                <div>
                    <!-- Display any other trade details you want -->
                </div>
                <br>
                <a href="{{ route('trades.index') }}" class="btn btn-primary">Back to Trade List</a>
            </div>
        </div>
    </div>

@endsection
