<div class="col-12">
    <h2 class="mb-5">New Arrivals</h2>
</div>

<div class="col-lg-4 col-12 mb-3">
    <div class="product-thumb">
        <a href="product-detail">
            <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg" class="img-fluid product-image" alt="">
        </a>

        <div class="product-top d-flex">
            <span class="product-alert me-auto">New Arrival</span>

            <a href="#" class="bi-heart-fill product-icon"></a>
        </div>
        @foreach ($items as $item)
        <div class="product-info d-flex">
            <div>
                <h5 class="product-title mb-0">
                    <a href="product-detail.blade.php" class="product-title-link">{{ $item->title }}</a>
                </h5>

                <p class="product-p">{{ $item->category }}</p>
            </div>

            <small class="product-price text-muted ms-auto">{{ $item->state }}</small>
        </div>
        @endforeach
    </div>
</div>

