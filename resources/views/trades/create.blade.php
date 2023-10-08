<!DOCTYPE html>
<html lang="en">
@include('basic component.head')

<body>
    <main>
        @include('basic component.navbar')

        <div class="container mt-5">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 mt-3">
                    <h1 class="text-center mt-5">Create New Trade</h1>

                    <form method="POST" action="{{ route('trades.store') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="proposalDate">Proposal Date:</label>
                            <input type="date" name="proposalDate" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="status">Status:</label>
                            <input type="text" name="status" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                       
    <label for="owner">Owner:</label>
    <select name="owner" class="form-control" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mt-3">
    <label for="offeredItem">Offered Item:</label>
    <select name="offeredItem" class="form-control" required>
        @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mt-3">
    <label for="requestedItem">Requested Item:</label>
    <select name="requestedItem" class="form-control" required>
        @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>

                        <div>
                            <button type="submit" class="btn btn-primary mt-5">Create Trade</button>
                        </div>
                    </form>
                </div>
                <div class=" mt-3"></div>
                <div class=" mt-3"></div>
            </div>
        </div>
    </main>

    @include('basic component.footer')
    @include('basic component.JAVASCRIPT_FILES')
</body>
</html>
