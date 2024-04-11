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
                            <input type="hidden" class="form" id="place_id" name="place_id" value="" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form" id="place_name" name="place_name" value="" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form" id="place_type" name="place_type" >
                        </div>
                        <div class="form-group">
                            <label for="names"></label>
                            <input type="text" name="names" id="names" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname"></label>
                            <input type="text" name="lastname" id="lastname" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" name="email" id="email" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="phone"></label>
                            <input type="tel" name="phone" id="phone" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="checkin"></label>
                            <input type="date" name="checkin" id="checkin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="checkout"></label>
                            <input type="date" name="checkout" id="checkout" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form" id="pricess" name="pricess" >
                        </div>
                        <button type="submit" class="btn btn-primary"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
