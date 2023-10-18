<div class="col-12">
    <h2 class="mb-5">New Item</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
</div>

@foreach ($items as $item)
    <div class="col-lg-3 col-12 mb-3">
        <div class="product-thumb">
            <a href="{{ route('items.show', $item->id) }}">
                <img src="{{ asset('uploads/' . $item->picture) }}" alt="" width="300" height="200">
            </a>

            <div class="product-top d-flex">
                {{--            <span class="product-alert me-auto">New Arrival</span>--}}

                <a href="#" class="bi-heart-fill product-icon"></a>
            </div>
            <div class="product-info d-flex">
                <div>
                    <h5 class="product-title mb-0">
                        <a href="{{ route('items.show', $item->id) }}" class="product-title-link">{{ $item->title }}</a>
                    </h5>

                    <p class="product-p">{{ $item->category->name  }}</p>
                </div>
                <div>
                    <small class="product-price text-muted ms-auto">{{ $item->state }}</small> . condition
                </div>
            </div>

            <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">Afficher</a>
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
@endforeach

