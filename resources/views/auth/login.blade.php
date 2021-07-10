{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Netflixify | Login</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/bootstrap.min.css')}}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/vendor.min.css')}}">

    <!--main styles-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/main.min.css')}}">
</head>
<body>
<div class="login">
    <div class="login-bg"></div>

    <div class="container">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <h2 class="text-center">Netflex<span class="text-primary">ify</span> Login </h2>

                <div><hr></div>
                <div class="col">

                    <a href="/login/facebook" class="fb btn">
                        <i class="fa fa-facebook"></i> Login with Facebook
                    </a>
                    <a href="/login/twitter" class="twitter btn">
                        <i class="fa fa-twitter"></i> Login with Twitter
                    </a>
                    <a href="/login/google" class="google btn">
                        <i class="fa fa-google"></i> Login with Google+
                    </a>
                </div>

                <div class="col">


                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="submit" value="Login">
                </div>
                <div><hr></div>
                <div class="row">

                    <div class="col-md-6">
                        <a href="register.html"  class="btn btn-dark">Sign up</a>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#"  class="btn btn-dark">Forget Password</a>
                    </div>
                </div>

            </div>
        </form>

    </div>



</div>





<script src="{{asset('front_files/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front_files/dist/js/jquery.min.js')}}"></script>

<script src="{{asset('front_files/dist/js/vendor.min.js')}}"></script>
<script src="{{asset('front_files/dist/js/main.min.js')}}"></script>
</body>

</html>
