@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Basic Datatable</h5>
            <div class="table-responsive">
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
            </div>

        </div>
    </div>
    <form id="delete-post-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

@endsection

