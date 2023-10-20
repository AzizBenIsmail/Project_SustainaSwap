<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')

    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <h1 class="text-center mt-5">Add New Item</h1>

                <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-3">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="category">Category:</label>
                        <select name="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="state">State:</label>
                        <select name="state" class="form-control" required>
                            <option value="Good" {{ old('state') === 'Good' ? 'selected' : '' }}>Good</option>
                            <option value="Bad" {{ old('state') === 'Bad' ? 'selected' : '' }}>Bad</option>
                            <option value="Medium" {{ old('state') === 'Medium' ? 'selected' : '' }}>Medium</option>
                        </select>
                        @error('state')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="picture">Picture:</label>
                        <input type="file" name="picture" class="form-control" required>
                        @error('picture')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Add New Item</button>
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
