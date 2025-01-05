<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Kraj</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F3F3F4;">

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #0dcaf0;">
    <div class="container">
        <a class="navbar-brand" href="/admin/dashboard">Panel Administratora</a>
    </div>
</nav>

<div class="container">
    <h1 class="text-center my-4">Edytuj Kraj</h1>

    <form action="{{ route('admin.countries.update', $country->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="country_name" class="form-label">Nazwa Kraju</label>
            <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $country->country_name }}" required>
        </div>

        <div class="mb-3">
            <label for="weather" class="form-label">Klimat</label>
            <input type="text" class="form-control" id="weather" name="weather" value="{{ $country->weather }}" required>
        </div>

        <div class="mb-3">
            <label for="tourist_attractions" class="form-label">Atrakcje Turystyczne</label>
            <textarea class="form-control" id="tourist_attractions" name="tourist_attractions" rows="3" required>{{ $country->tourist_attractions }}</textarea>
        </div>

        <div class="mb-3">
            <label for="recommended_activities" class="form-label">Rekomendowane Aktywności</label>
            <textarea class="form-control" id="recommended_activities" name="recommended_activities" rows="3" required>{{ $country->recommended_activities }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prices" class="form-label">Ceny</label>
            <input type="text" class="form-control" id="prices" name="prices" value="{{ $country->prices }}" required>
        </div>

        <button type="submit" class="btn btn-success">Zapisz Zmiany</button>
        <a href="{{ route('admin.countries') }}" class="btn btn-secondary">Anuluj</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
