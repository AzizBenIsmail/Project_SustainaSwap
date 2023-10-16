@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
    <div class="container">
        <div class="row ">
            <div class="col-md-8 mt-3">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Catégorie</a>

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
            </div>

        </div>
    </div>
    <form id="delete-post-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('delete-post')) {
                e.preventDefault();
                const postId = e.target.getAttribute('data-post-id');
                if (confirm('Are you sure you want to delete this post?')) {
                    const deleteForm = document.getElementById('delete-post-form');
                    deleteForm.action = `/admin/posts/${postId}`;
                    deleteForm.submit();
                }
            }
        });
    </script>
@endsection
