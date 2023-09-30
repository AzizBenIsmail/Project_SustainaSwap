@extends('layouts.app')

@section('content')
    <h1>Créer un nouvel élément</h1>

    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="picture">Image :</label>
            <input type="file" name="picture" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Catégorie :</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duration">Durée :</label>
            <input type="number" name="duration" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="state">État :</label>
            <input type="text" name="state" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
