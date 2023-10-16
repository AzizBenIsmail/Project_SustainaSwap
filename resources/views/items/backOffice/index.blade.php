@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('itemsAdmin.create') }}" class="btn btn-primary">Add Item</a>
            <div class="table-responsive">
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
                            <td>{{ $item->category_id }}</td>
                            <td>
                                <a href="{{ route('itemsAdmin.show', $item->id) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('itemsAdmin.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('itemsAdmin.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <form id="delete-post-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

@endsection