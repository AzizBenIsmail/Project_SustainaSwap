<!doctype html>
<html lang="en">

@include('basic component.head')

<body>

<section class="preloader">
    <div class="spinner">
        <span class="sk-inner-circle"></span>
    </div>
</section>

<main>
    @include('basic component.navbar', ['currentPage' => 'home'])

    @include("Home component.cover_picture")

{{--    @include("Home component.Get_started")--}}

{{--    @include('Home component.Retail_shop')--}}

    @include('Home component.Featured_Products')

</main>

@include('basic component.footer')

@include('basic component.JAVASCRIPT_FILES')


</body>
</html>
