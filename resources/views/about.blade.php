<!doctype html>
<html lang="en">

    @include('head')

    <body>


        <main>

            @include('navbar', ['currentPage' => 'about'])

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Sustaina </span>
                                <span class="d-block text-dark">Swap</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="images/header/businesspeople-meeting-office-working.jpg" class="header-image img-fluid" alt="">
            </header>

            @include('our_team')

            <section class="testimonial section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-9 mx-auto col-11">
                            <h2 class="text-center">Customer love, <br> <span>Sustaina </span> Swap</h2>

                            <div class="slick-testimonial">

                                <div class="slick-testimonial-caption">
                                    <p class="lead">A good barter is better than a bad trial</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/scared.png" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Team, <strong class="text-muted">Scared to compile</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        @include('footer')

        <!-- TEAM MEMBER MODAL -->


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
