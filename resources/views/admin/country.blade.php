<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora - Kraje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F3F3F4;">

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #0dcaf0;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="/admin/dashboard">Panel administratora</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.contact') }}">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.results') }}">Wyniki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.countries') }}">Kraje</a>
                </li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj się</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center my-4">Panel Administratora - Kraje</h1>

    <div class="mb-3 text-end">
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">Dodaj nowy kraj</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nazwa Kraju</th>
            <th>Klimat</th>
            <th>Atrakcje Turystyczne</th>
            <th>Rekomendowane Aktywności</th>
            <th>Ceny</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->country_name }}</td>
                <td>{{ $country->weather }}</td>
                <td>{{ $country->tourist_attractions }}</td>
                <td>{{ $country->recommended_activities }}</td>
                <td>{{ $country->prices }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
