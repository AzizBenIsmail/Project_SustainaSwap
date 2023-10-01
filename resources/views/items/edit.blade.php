<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')

    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <h1 class="text-center mt-5">Update Item</h1>

                <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="title">Title :</label>
                        <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description :</label>
                        <input name="description" class="form-control" value="{{ $item->description }}" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="category">Catégorie :</label>
                        <input type="text" name="category" class="form-control" value="{{ $item->category }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="state">State :</label>
                        <input type="text" name="state" class="form-control" value="{{ $item->state }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="picture">Image actuelle :</label>
                        <img src="{{ asset('uploads/' . $item->picture) }}" alt="Current Image" class="img-thumbnail" width="250" height="250">
                    </div>
                    <div class="form-group mt-3">
                        <label for="picture">Nouvelle image :</label>
                        <input type="file" name="picture" class="form-control">
                    </div>

                    <div >
                        <button type="submit" class="btn btn-primary mt-5">Update Item</button>
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
