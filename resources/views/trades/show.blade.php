@extends('layouts.app')

@section('content')
@include('basic component.head')
@include('basic component.navbar')

<div class="container mt-5">
<br> <br> <br> <br> <br> <br> <br> <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #E9967A; color: #fff;">
                    <h1 class="card-title" >Trade Details</h1>
                </div>
                <div class="card-body">
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
                        <strong>Owner:</strong> {{ $trade->owner->name }}
                    </div>
                    <div>
                        <strong>Offered Item:</strong> {{ $trade->offeredItem->title }}
                    </div>
                    <div>
                        <strong>Requested Item:</strong> {{ $trade->requestedItem->title }}
                    </div>
                    <br> <br>
                    
                    <div>
                       <!-- Avis Section -->

                    <br>
                    <a href="{{ route('trades.index') }}" class="btn btn-primary" style="background-color: #FF7F50; color: #fff;">Back</a>
                    <a href="{{ route('trades.edit', $trade->id) }}" class="btn btn-warning" style="background-color: #FFA500; color: #fff;">Edit</a>
                            <form action="{{ route('trades.destroy', $trade->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                </div>
                <div>
    <h4>FeedBacks:</h4>
    @if ($trade->avis)
    <table class="table">

    <tbody>
        @foreach($trade->avis as $avi)
        <tr>
            <td>{{ $avi->comment }}</td>
            <td>
                <form action="{{ route('avis.destroy', $avi->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn-close" data-bs-dismiss="modal"  style="background-color: #FF7F50; color: #fff;"></button>
                </form>
             <!--    <form action="{{ route('avis.edit', $avi->id) }}" method="GET" style="display: inline;">
                    @csrf
                    <small> <button type="submit"  class="btn-edit" data-bs-dismiss="modal"  style="background-color: #FF7F50; color: #fff;">edit</button><small>
                </form> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        <div class="col-lg-5 col-10">

                <form class="contact-form me-lg-5 pe-lg-3" role="form" action="{{ route('avis.store') }}" method="POST">
                @csrf
                <input type="hidden" name="trade_id" value="{{ $trade->id }}">
                    <div class="form-floating">
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="Full name" required>
                        @error('comment')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="comment">Your feedback/label>
                    </div>
                    <br>
                    <div class="col-lg-5 col-6">
                        <button type="submit" class="form-control">Submit Feedback</button>
                    </div>
                </form>
            </div>

    @else
        <p>No Avis available for this trade.</p>
    @endif
</div>
<!-- End Avis Section -->
                

                
            </div>
        </div>
    </div>
</div>
<br> <br> <br> <br>
@include('basic component.footer')
@endsection
