<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')
    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <h1>Modifier la Catégorie : {{ $category->name }}</h1>

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"
                                  required>{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
</main>
@include('basic component.footer')
@include('basic component.JAVASCRIPT_FILES')

</body>
</html>
