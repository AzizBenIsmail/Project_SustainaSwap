<!doctype html>
<html lang="en">

@include('basic component.head')


<body>

<main>

    @include('basic component.navbar', ['currentPage' => 'contact'])


    @include('Contact Component.cover_picture')

    @include('Contact Component.Complaints')

</main>

@include('basic component.footer')

@include('basic component.JAVASCRIPT_FILES')

</body>
</html>
