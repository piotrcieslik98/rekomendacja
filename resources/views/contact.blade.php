<!DOCTYPE html>
<html>
<head>
    <title>Formularz kontaktowy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="{{route('login')}}">Zaloguj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Zarejestruj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.form')}}">Kontakt</a>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Wyloguj się</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
</body>
<div>
    <div class="container"><br/><br/>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">Kontakt</h1>
                </div>
                <!-- Wyświetlenie komunikatu sukcesu -->
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.send') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subject">Temat</label>
                        <input type="text" class="form-control" id="topic" name="topic">
                        @if ($errors->has('topic'))
                            <span class="text-danger">{{ $errors->first('topic') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message">Wiadomość</label>
                        <textarea class="form-control" id="message" rows="3" maxlength="255" name="message"></textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-primary">Wyślij wiadomość</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>
