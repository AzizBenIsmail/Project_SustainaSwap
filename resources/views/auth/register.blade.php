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

    <section class="sign-in-form section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mx-auto col-12">

                    <h1 class="hero-title text-center mb-5">Register</h1>

{{--                    <div class="social-login d-flex flex-column w-50 m-auto">--}}

{{--                        <a href="#" class="btn custom-btn social-btn mb-4">--}}
{{--                            <i class="bi bi-google me-3"></i>--}}

{{--                            Continue with Google--}}
{{--                        </a>--}}

{{--                        <a href="#" class="btn custom-btn social-btn">--}}
{{--                            <i class="bi bi-facebook me-3"></i>--}}

{{--                            Continue with Facebook--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="div-separator w-50 m-auto my-5"><span>or</span></div>--}}

                    <div class="row">
                        <div class="col-lg-8 col-11 mx-auto">

                            <form role="form" method="post" action="{{ route('register') }}">
                                @csrf

                                <div class="form-floating">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror" placeholder="Name" required autocomplete="name"autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="name">Name</label>
                                </div>


                                <div class="form-floating my-4">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{4,10}"
                                           class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="password">Password</label>

{{--                                    <p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p>--}}
                                </div>

                                <div class="form-floating">
                                    <input type="password" name="password_confirmation" id="password-confirm"
                                           class="form-control" placeholder="Password" required autocomplete="new-password">

                                    <label for="password-confirm">Password Confirmation</label>
                                </div>

                                <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                    Create account
                                </button>

                                <p class="text-center">Already have an account? Please <a href="{{ route('login') }}">Sign
                                        In</a></p>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>

@include('basic component.footer')

@include('basic component.JAVASCRIPT_FILES')


</body>
</html>
