@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>
    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <div class="col-lg-6 col-12">
                    <div class="product-thumb">
                        <img src="{{ asset('uploads/' . $item->picture) }}"
                             class="img-fluid product-image" alt="">
                    </div>
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

    <a href="{{ route('itemsAdmin.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
    </div>
    </div>


@endsection
