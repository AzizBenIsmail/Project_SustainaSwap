<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')
    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <h1 class="text-center mt-5">Add New Catégorie</h1>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Catégorie</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
