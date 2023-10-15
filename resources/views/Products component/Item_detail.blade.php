<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<main>

    @include('basic component.navbar')


    <header class="site-header section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h1>
                        <span class="d-block text-primary">We provide you</span>
                        <span class="d-block text-dark">Fashionable Stuffs</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section class="product-detail section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="product-thumb">
                        <img src="{{ asset('uploads/' . $item->picture) }}"
                             class="img-fluid product-image" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="product-info d-flex">
                        <div>
                            <h2 class="product-title mb-0">{{ $item->title }}</h2>

                            <p class="product-p"> {{ $item->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>

                        <small class="product-price text-muted ms-auto mt-auto mb-5"> {{ $item->state }}</small>
                    </div>
                    <small class="product-price text-muted ms-auto mt-4 mb-2">
                        Owner : {{ $item->user->name }}
                    </small>
                    <br>
                    <small class="product-price text-muted ms-auto mt-4 mb-2">
                        category : {{ $category->name }}
                    </small>
                    <div class="product-description">

                        <strong class="d-block mt-4 mb-2">Description : {{ $item->description }}</strong>

                    </div>

                    <div class="product-cart-thumb row">
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning" >Modifier</a>
                        <form href="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="related-product section-padding border-top">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h3 class="mb-5">You might also like</h3>
                </div>

                <div class="col-lg-4 col-12 mb-3">
                    <div class="product-thumb">
                        <a href="product-detail.html">
                            <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg"
                                 class="img-fluid product-image" alt="">
                        </a>

                        <div class="product-top d-flex">
                            <span class="product-alert me-auto">New arrival</span>

                            <a href="#" class="bi-heart-fill product-icon"></a>
                        </div>

                        <div class="product-info d-flex">
                            <div>
                                <h5 class="product-title mb-0">
                                    <a href="product-detail.html" class="product-title-link">Tree pot</a>
                                </h5>

                                <p class="product-p">Original package design from house</p>
                            </div>

                            <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@include('basic component.footer')


<!-- CART MODAL -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header flex-column">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                        <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg"
                             class="img-fluid product-image" alt="">
                    </div>

                    <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                        <h3 class="modal-title" id="exampleModalLabel">Tree pot</h3>

                        <p class="product-price text-muted mt-3">$25</p>

                        <p class="product-p">Quatity: <span class="ms-1">4</span></p>

                        <p class="product-p">Colour: <span class="ms-1">Black</span></p>

                        <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>

                        <div class="border-top mt-4 pt-3">
                            <p class="product-p"><strong>Total: <span class="ms-1">$100</span></strong></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row w-50">
                    <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                </div>
            </div>
        </div>

    </div>
</div>

@include('basic component.JAVASCRIPT_FILES')


</body>
</html>
