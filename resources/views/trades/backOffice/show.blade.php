@extends('layouts.admin')

@section('content')

<h1>Trade Details</h1>

<div class="container mt-12">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 mt-6">
            <div class="col-lg-12 col-12">
                <div class="product-thumb">
                    <!-- Display the trade's picture, if available -->
                    <img src="{{ asset('uploads/' . $trade->picture) }}" class="img-fluid product-image" alt="">
                </div>
            </div>

            <!-- Trade Details -->
            <div>
                <h3><strong>Trade Start Date:</strong> {{ $trade->tradeStartDate }}</h3>
            </div>
            <div>
                <h3><strong>Trade End Date:</strong> {{ $trade->tradeEndDate }}</h3>
            </div>
            <div>
                <h3><strong>Status:</strong> {{ $trade->status }}</h3>
            </div>
            <div>
                <h3><strong>Owner:</strong> {{ $trade->owner->name }}</h3>
            </div>
            <div>
                <h3><strong>Offered Item:</strong> {{ $trade->offeredItem->title }}</h3>
            </div>
            <div>
                <h3><strong>Requested Item:</strong> {{ $trade->requestedItem->title }}</h3>
            </div>
<br>
            <!-- Feedbacks (Avis) -->
            <h3>FeedBacks:</h3>
            @if ($trade->avis->isNotEmpty())
            <table class="table">
                <tbody>
                    @foreach ($trade->avis as $avi)
                    <tr>
                        <td>{{ $avi->comment }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No Avis available for this trade.</p>
            @endif

            <br>
            <a href="{{ route('tradesAdmin.index') }}" class="btn btn-primary">Back to Trade List</a>
        </div>
    </div>
</div>

@endsection
