<section class="featured-product section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-5">Featured Item</h2>
            </div>

            <form action="{{ route('indexmain') }}" method="GET" class="my-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search a Item...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="sort" class="text-muted">Sort  :</label>
                            <select name="sort" class="form-control" id="sort">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="state" {{ request('sort') == 'state' ? 'selected' : '' }}>State</option>
                                <option value="category" {{ request('sort') == 'category' ? 'selected' : '' }}>Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="category" class="text-muted">Category :</label>
                            <select name="category" class="form-control" id="category">
                                <option value="" {{ request('category') == '' ? 'selected' : '' }}>All category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>


        @foreach ($items as $item)
                <div class="col-lg-3 col-12 mb-3">
                    <div class="product-thumb">
                        <a href="{{ route('showmain', $item->id) }}">
                            <img src="{{ asset('uploads/' . $item->picture) }}" alt="" width="250" height="150">
                        </a>

                        <div class="product-top d-flex">
                                {{--            <span class="product-alert me-auto">New Arrival</span--}}

                            <a href="#" class="bi-heart-fill product-icon"></a>
                        </div>
                        <div class="product-info d-flex">
                            <div>
                                <h5 class="product-title mb-0">
                                    <a href="{{ route('showmain', $item->id) }}" class="product-title-link">{{ $item->title }}</a>
                                </h5>

                                <p class="product-p">{{ $item->category->name }}</p>
                            </div>
                            <div>
                                <small class="product-price text-muted ms-auto">{{ $item->state }}</small> . condition
                            </div>
                        </div>

                            <a href="{{ route('/chat', ['item_id' => $item->id]) }}" class="btn btn-primary" style="background-color: #FF7F50; color: #fff;">Chat</a>
                        <a href="{{ route('showmain', $item->id) }}" class="btn btn-info">Show</a>
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


        </div>
    </div>
</section>
