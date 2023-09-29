<!doctype html>
<html lang="en">

@include('basic component.head')

<body>


<main>

    @include('basic component.navbar', ['currentPage' => 'Template component.about'])

    @include('About component.cover_picture')

    @include('About component.our_team')

    @include('About component.proverb')

</main>

@include('basic component.footer')

<!-- TEAM MEMBER MODAL -->


@include('basic component.JAVASCRIPT_FILES')


</body>
</html>
