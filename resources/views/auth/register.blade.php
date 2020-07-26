<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
		<title>My Portal Service Admin  - Registro</title>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="img/logo-dark.png" alt="Le Rouge Admin Dashboard" />
                            </a>
                            <h5>Bem vindo,<br />Crie uma conta para ter acesso.</h5>
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password"/>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Conform Password" required autocomplete="new-password">
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    A senha deve ter entre 8 e 20 caracteres.
                                </small>
                            </div>
                            <div class="actions mb-4">
                                <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
                            </div>
                            <hr>
                            <div class="m-0">
                                <span class="additional-link">Já tenho conta <a href="{{ route('login') }}" class="btn btn-dark">Login</a></span>
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
