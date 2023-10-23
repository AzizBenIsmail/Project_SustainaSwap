<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <h1 class="text-center mt-5">Update Trade</h1>

                <form method="POST" action="{{ route('trades.update', $trade->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="tradeStartDate">Trade Start Date:</label>
                        <input type="date" name="tradeStartDate" class="form-control" value="{{ $trade->tradeStartDate }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tradeEndDate">Trade End Date:</label>
                        <input type="date" name="tradeEndDate" class="form-control" value="{{ $trade->tradeEndDate }}" required>
                    </div>
                    
                    
                    <div class="form-group mt-3">
                        <label for="offeredItem">Offered Item:</label>
                        <select name="offered_item_id" class="form-control" required>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" @if ($trade->offeredItem->id === $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary mt-5">Update Trade</button>
                </form>
            </div>
            <div class="mt-3"></div>
            <div class="mt-3"></div>
        </div>
    </div>
</main>

@include('basic component.footer')
@include('basic component.JAVASCRIPT_FILES')

</body>
</html>
