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

                    <h1 class="hero-title text-center mb-5">Log In</h1>

                    <div class="row">
                        <div class="col-lg-8 col-11 mx-auto">
                            <form role="form" method="post"  action="{{ route('login') }}">
                            @csrf
                                <div class="form-floating mb-4 p-0">
                                    <input type="email" name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating p-0">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="password">Password</label>
                                </div>

                                <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                    Sign in
                                </button>

                                <p class="text-center">Forgot your password?
                                    <a href="{{ route('password.request') }}">Reset Password</a>
                                </p>
                                                    <div class="div-separator w-50 m-auto my-5"><span>or</span></div>
                                <p class="text-center">Don’t have an account?
                                    <a href="{{ route('register') }}">Create One</a>
                                </p>
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
