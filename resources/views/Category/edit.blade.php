@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="container ">
        <div class="row justify-content-center">
            <div class="">
                <h1>Modifier la Catégorie : {{ $category->name }}</h1>

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"
                                  required>{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
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

