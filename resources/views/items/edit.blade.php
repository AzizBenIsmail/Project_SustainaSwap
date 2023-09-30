@extends('layouts.app')

@section('content')
    <h1>Modifier l'élément</h1>

    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="picture">Image :</label>
            <input type="text" name="picture" class="form-control" value="{{ $item->picture }}" required>
        </div>
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control">{{ $item->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Catégorie :</label>
            <input type="text" name="category" class="form-control" value="{{ $item->category }}" required>
        </div>
        <div class="form-group">
            <label for="duration">Durée :</label>
            <input type="number" name="duration" class="form-control" value="{{ $item->duration }}" required>
        </div>
        <div class="form-group">
            <label for="state">État :</label>
            <input type="text" name="state" class="form-control" value="{{ $item->state }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
