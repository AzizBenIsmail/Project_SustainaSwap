@extends('layouts.admin')

@section('content')

    <h1>Trade Details</h1>

    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <div class="col-lg-6 col-12">
                    <div class="product-thumb">
                        <!-- Display the trade's picture, if available -->
                        <img src="{{ asset('uploads/' . $trade->picture) }}"
                             class="img-fluid product-image" alt="">
                    </div>
                </div>
                <div>
                    <strong>Trade Start Date:</strong> {{ $trade->tradeStartDate }}
                </div>
                <div>
                    <strong>Trade End Date:</strong> {{ $trade->tradeEndDate }}
                </div>
                <div>
                    <strong>Status:</strong> {{ $trade->status }}
                </div>
                <div>
                    <!-- Display the owner's name -->
                    <strong>Owner:</strong> {{ $trade->owner->name }}
                </div>
                <div>
                    <!-- Display the offered item's title -->
                    <strong>Offered Item:</strong> {{ $trade->offeredItem->title }}
                </div>
                <div>
                    <!-- Display the requested item's title -->
                    <strong>Requested Item:</strong> {{ $trade->requestedItem->title }}
                </div>
                <div>
                    <!-- Display any other trade details you want -->
                </div>

                <a href="{{ route('trades.index') }}" class="btn btn-primary">Back to Trade List</a>
            </div>
        </div>
    </div>

@endsection
