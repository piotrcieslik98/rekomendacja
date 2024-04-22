<!DOCTYPE html>
<html>
<head>
    <title></title>
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
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
<div>
<div class="container"><br/><br/>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h1 class="card-header text-center">Rekomendacja</h1>
            </div>
        </div>
    </div>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="text">Preferowany klimat?</label>
                            <select class="form-select" id="room_type" name="room_type">
                                <option> </option>
                                <option>10-15°C</option>
                                <option>15-19°C</option>
                                <option>20-25°C</option>
                                <option>25-30°C</option>
                                <option>30°C-...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">Jakiego rodzaju atrakcje są dla Ciebie najważniejsze?</label>
                            <input type="text" name="" id="" class="form-control">
{{--                            <select class="form-select" id="room_type" name="room_type">--}}
{{--                                <option> </option>--}}
{{--                                <option>Zwiedzanie</option>--}}
{{--                                <option>Wędrówki</option>--}}

{{--                            </select>--}}
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="email">Aktywności w czasie podróży?</label>--}}
{{--                            <input type="text" name="" id="" class="form-control"  required>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="text">Jaki jest Twój budżet podróży?</label>
                            <select class="form-select" id="room_type" name="room_type">
                                <option> </option>
                                <option>Niski</option>
                                <option>Średni</option>
                                <option>Wysoki</option>
                            </select>
                        </div>
                </div>
                        <button type="submit" class="btn btn-primary">Rekomenduj podróż</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
