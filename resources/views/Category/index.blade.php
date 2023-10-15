<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')
    <div class="container mt-5 ">
        <div class="row mt-5">
            <div class="col-md-8 mt-3">
                <h1 class="text-center mt-5">Liste des Catégories</h1>

                <a href="{{ route('categories.create') }}" class="btn btn-primary">Nouvelle Catégorie</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Éditer</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
