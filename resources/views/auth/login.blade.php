@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean.css">
</head>

<body class="bg-gradient-primary" style="background-image: url(&quot;assets/img/gradient%20image.jpg&quot;);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex" style="background-repeat: no-repeat;background-size: contain;">
                                <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/HomeService%20Icon.svg&quot;);background-repeat: no-repeat;background-size: contain;margin: 26px;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Inicia sesión</h4>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-image: url(&quot;assets/img/gradient%20image.jpg&quot;);">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                        <div class="text-center"><a class="small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></div>
                                        @endif                                    
                                    </div>
                                    <div class="text-center"><a class="small" href="{{ route('register') }}">Crea una cuenta </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

@endsection
