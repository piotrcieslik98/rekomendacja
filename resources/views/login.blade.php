@extends('layout')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F3F3F4">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #0dcaf0;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="/">Rekomendacja</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Zarejestruj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.form')}}">Kontakt</a>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.form')}}">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Wyloguj się</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container"><br/><br/>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header text-center">Logowanie</h3>
                @if(\Session::has('message'))
                    <div class="alert alert-info">
                        {{\Session::get('message')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('postlogin') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Adres e-mail" id="email" class="form-control" name="email"
                                   autofocus required>

                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Hasło" id="password" class="form-control" name="password" required>
                        <div>
                            <li class="d-grid mx-auto">
                                <a class="nav-link" href="{{ route('password.request') }}">Nie pamiętam hasła</a>
                            </li>
                        </div>
                            <div class="form-group mb-3">
                                <label for="captcha">Ile to: {{ session('captcha_question') }}</label>
                                <input type="number" placeholder="Wpisz wynik" id="captcha" class="form-control" name="captcha" required>
                                @if ($errors->has('captcha'))
                                    <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Zaloguj się</button>
                        </div>
                        </div>
                    </form>
                    <li class="d-grid mx-auto">
                        <a class="nav-link" href="{{ route('recommendation.form') }}">Wróć do strony głównej</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
