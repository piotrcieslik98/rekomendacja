<!DOCTYPE html>
<html>
<head>
    <title>Rekomendacja podróży</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F3F3F4">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h1 class="card-header text-center">Rekomendacja podróży</h1>
                <div class="card-body">
                    <form action="/recomend" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="climate">Preferowany klimat?</label>
                            <select class="form-select" id="climate" name="climate">
                                <option> </option>
                                @foreach($temperatureOptions as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recommended_activities">Jakiego rodzaju atrakcje są dla Ciebie najważniejsze?</label>
                            <select class="form-select" id="recommended_activities" name="recommended_activities">
                                <option> </option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity }}">{{ $activity }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="budget">Jaki jest Twój budżet podróży?</label>
                            <select class="form-select" id="budget" name="budget">
                                <option> </option>
                                <option>Niskie</option>
                                <option>Średnie</option>
                                <option>Wysokie</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Rekomenduj podróż</button>
                    </form>
                </div>
            </div>
            @if(isset($recommendedCountry))
                <div class="form-group">
                    <label for="recommended_country">Rekomendowany kraj podróży:</label>
                    <input type="text" class="form-control" id="recommended_country" name="recommended_country" value="{{ $recommendedCountry->country_name }}" readonly>
                </div>
            @endif

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
