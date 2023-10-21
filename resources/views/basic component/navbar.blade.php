<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="">
            <img src="{{ asset("favicon.png")}}" class="img-fluid" alt="" width="60" height="50">
            <strong><span>Sustaina</span> Swap</strong>
        </a>

        <div class="d-lg-none">
            <a href="sign-in" class="bi-person custom-icon me-3"></a>

            <a href="product-detail" class="bi-bag custom-icon"></a>
        </div>
        @php
            $currentPage = isset($currentPage) ? $currentPage : '';
        @endphp

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'home' ? ' active' : '' }}" href="/">Home</a>
                </li>
                <!-- Répétez ce modèle pour les autres liens de la navbar -->

                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'posts' ? ' active' : '' }}" href="posts">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'about' ? ' active' : '' }}" href="about">Story</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'products' ? ' active' : '' }}" href="items">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'faq' ? ' active' : '' }}" href="faq">FAQs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ $currentPage === 'contact' ? ' active' : '' }}" href="contact">Contact</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                @if(auth()->check())
                    <a href="{{ route('home') }}" class="bi-person custom-icon"></a>
                    <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                    class="bi-door-open custom-icon">
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bi-person custom-icon"></a>
                @endif

{{--                <a href="product-detail" class="bi-bag custom-icon"></a>--}}

            </div>
        </div>
    </div>
</nav>
