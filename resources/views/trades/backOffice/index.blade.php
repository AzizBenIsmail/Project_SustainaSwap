@extends('layouts.admin')

@section('content')

    <h1>Trade Management</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                       
                        <th>Trade Start Date</th>
                        <th>Trade End Date</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($trades as $trade)
                        <tr>
                            <td>{{ $trade->id }}</td>
                            <td>{{ $trade->tradeStartDate }}</td>
                            <td>{{ $trade->tradeEndDate }}</td>
                            <td>{{ $trade->status }}</td>

                            <td>
                                <a href="{{ route('tradesAdmin.show', $trade->id) }}" class="btn btn-info">View</a>
                                <form action="{{ route('tradesAdmin.destroy', $trade->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="delete-trade-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    

@endsection
