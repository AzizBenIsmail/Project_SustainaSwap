

@extends('layouts.app')

@section('content')
@include('basic component.head')
@include('basic component.navbar')
   

    <table class="table">
    <br><br>  <br><br>   <br><br>   <br><br>
    <h1> Trades List</h1>
    <a href="{{ route('trades.create') }}" class="btn btn-success">New Trade</a>
        <thead>
        <tr>
           
            <th>Proposal Date</th>
            <th>Status</th>
            <th>Owner</th>
            <th>Offered Item</th>
            <th>Requested Item</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($trades as $trade)
            <tr>
               
                <td>{{ $trade->proposalDate }}</td>
                <td>{{ $trade->status }}</td>
                <td>{{ $trade->owner}}</td>
                <td>{{ $trade->offeredItem }}</td>
                <td>{{ $trade->requestedItem}}</td>
                <td>
                    <a href="{{ route('trades.show', $trade->id) }}" class="btn btn-info">Afficher</a>
                    <a href="{{ route('trades.edit', $trade->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('trades.destroy', $trade->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>  <br><br>   <br><br>   <br><br>
    @include('basic component.footer')
@endsection

@include('basic component.JAVASCRIPT_FILES')
