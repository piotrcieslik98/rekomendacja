<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora - Wyniki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F3F3F4;">

<!-- Nawigacja -->
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

<!-- Treść strony -->
<div class="container">
    <h1 class="text-center my-4">Panel Administratora - Wyniki</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Użytkownik ID</th>
            <th>Rekomendowany Kraj</th>
            <th>Klimat</th>
            <th>Aktywności</th>
            <th>Budżet</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->user_id }}</td>
                <td>{{ $result->recommended_country }}</td>
                <td>{{ $result->weather }}</td>
                <td>{{ $result->recommended_activities }}</td>
                <td>{{ $result->budget }}</td>
                <td>
                    <form action="{{ route('admin.deleteresult', $result->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="pagination justify-content-center">
        {{ $results->links() }}
    </div>
</div>

<!-- Stopka -->
<footer class="text-center py-3">
    <p class="mb-0">© 2023 Panel Administratora</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
