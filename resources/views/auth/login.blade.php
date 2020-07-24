<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
		<title>My Portal Service Admin  - Login</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body class="authentication">
    
    <!-- Container start -->
    <div class="container">
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="img/logo-dark.png" alt="Le Rouge Admin Dashboard" />
                            </a>
                            <h5>Seja bem vindo,<br />Faça login na sua conta.</h5>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Lembrar</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="forgot-pwd">
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                                @endif
                            </div>
                            <hr>
                            <div class="actions align-left">
                                <a href="{{ route('register') }}" class="link">Não tenho conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
    <!-- Container end -->
    
</body>
</html>