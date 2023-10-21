@extends('layouts.app')

@section('content')
    <h1>Items List</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Créer un nouvel élément</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <img src="{{ asset('uploads/' . $item->picture) }}" alt="Image de l'élément" width="100">
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->category }}</td>
                <td>
                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">Afficher</a>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
