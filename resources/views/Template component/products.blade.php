<!doctype html>
<html lang="en">

@include('basic component.head')


<body>

<main>

    @include('basic component.navbar', ['currentPage' => 'products'])

    <header class="site-header section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h1>
                        <span class="d-block text-primary">Choose your</span>
                        <span class="d-block text-dark">favorite stuffs</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section class="products section-padding">
        <div class="container">
            <div class="row">

                @include('Products component.New_Arrivals')

                @include('Products component.Popular')

            </div>
        </div>
    </section>

</main>

@include('basic component.footer')

@include('basic component.JAVASCRIPT_FILES')

</body>
</html>
