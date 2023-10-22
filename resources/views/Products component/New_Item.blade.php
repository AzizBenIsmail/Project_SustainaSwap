<div class="col-12">
    <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
</div>

            @foreach ($items as $item)
                <div class="col-lg-3 col-12 mb-3">
                    <div class="product-thumb">
                        <a href="{{ route('items.show', $item->id) }}">
                            <img src="{{ asset('uploads/' . $item->picture) }}" alt="" width="300" height="200">
                        </a>

                        <div class="product-top d-flex">
                            {{--            <span class="product-alert me-auto">New Arrival</span--}}

                            <a href="#" class="bi-heart-fill product-icon"></a>
                        </div>
                        <div class="product-info d-flex">
                            <div>
                                <h5 class="product-title mb-0">
                                    <a href="{{ route('items.show', $item->id) }}" class="product-title-link">{{ $item->title }}</a>
                                </h5>

                                <p class="product-p">{{ $item->category->name }}</p>
                            </div>
                            <div>
                                <small class="product-price text-muted ms-auto">{{ $item->state }}</small> . condition
                            </div>
                        </div>

                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

                @if ($items->hasPages())
                    <ul class="pagination">
                        <!-- Lien "Previous" -->
                        @if ($items->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $items->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                        @endif

                        <!-- Numéro de page actuel -->
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">{{ $items->currentPage() }}</span>
                        </li>

                        <!-- Lien "Next" -->
                        @if ($items->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $items->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                @endif




