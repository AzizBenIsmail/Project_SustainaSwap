@extends('layouts.app')

@section('content')
    <h1>Détails de l'élément</h1>

    <div>
        <strong>Image :</strong>
        <img src="{{ asset('uploads/' . $item->picture) }}" alt="Image de l'élément">
    </div>
    <div>
        <strong>Titre :</strong> {{ $item->title }}
    </div>
    <div>
        <strong>Description :</strong> {{ $item->description }}
    </div>
    <div>
        <strong>Catégorie :</strong> {{ $item->category }}
    </div>
    <div>
        <strong>Durée :</strong> {{ $item->duration }}
    </div>
    <div>
        <strong>État :</strong> {{ $item->state }}
    </div>

    <a href="{{ route('items.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection
