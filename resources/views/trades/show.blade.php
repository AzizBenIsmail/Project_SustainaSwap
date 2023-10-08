@extends('layouts.app')

@section('content')
@include('basic component.head')
@include('basic component.navbar')
<br><br>  <br><br>   <br><br>   <br><br>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Trade Details</h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <strong>Proposal Date:</strong> {{ $trade->proposalDate }}
                        </div>
                        <div>
                            <strong>Status:</strong> {{ $trade->status }}
                        </div>
                        <div>
                            <strong>Owner:</strong> {{ $trade->owner }}
                        </div>
                        <div>
                            <strong>Offered Item:</strong> {{ $trade->offeredItem}}
                        </div>
                        <div>
                            <strong>Requested Item:</strong> {{ $trade->requestedItem }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('trades.index') }}" class="btn btn-primary">Back to Trade List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>  <br><br>   <br><br> 
@include('basic component.footer')
@endsection

