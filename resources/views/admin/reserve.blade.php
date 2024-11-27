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
        <a class="navbar-brand mr-auto" href="/admin/dashboard">Panel administratora</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.home')}}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.view')}}">Miejsca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">Użytkownicy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reserve')}}">Rezerwacje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.contact')}}">Kontakt</a>
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
    <br/><br/>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h1 class="card-header text-center">Rezerwacje</h1>
                <form action="{{ route('admin.reserve') }}" method="GET">
                    <div class="form-group mb-3">
                        <label for="place_name">Nazwa miejsca</label>
                        <input type="text" name="place_name" class="form-control" placeholder="" list="place_name">
                        <datalist id="place_name">
                            @foreach ($reserve->pluck('place_name')->unique()->sort() as $place_name)
                                <option value="{{ $place_name }}">
                            @endforeach
                        </datalist>
                        <label for="checkin">Data zameldowania</label>
                        <input type="date" name="checkin" class="form-control" value="{{ date('Y-m-d') }}" placeholder="">
                        <label for="checkout">Data wymeldowania</label>
                        <input type="date" name="checkout" class="form-control"  placeholder="">
                    </div>
                    <button style="float: right" type="submit">Szukaj</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4"></div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Id miejsca</th>
            <th>Nazwa miejsca</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Data zameldowania</th>
            <th>Data wymeldowania</th>
            <th>Cena</th>
            <th>Status</th>
            <th>Ilość nocy</th>
            <th>Czy promocja?</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reserve as $reserves)
            <tr>
                <td>{{ $reserves->reserve_id }}</td>
                <td>{{ $reserves->place_id }}</td>
                <td>{{ $reserves->place_name }}</td>
                <td>{{ $reserves->names }}</td>
                <td>{{ $reserves->lastname }}</td>
                <td><a href="mailto:{{ $reserves->email }}">{{ $reserves->email }}</a></td>
                <td>{{ $reserves->phone }}</td>
                <td>{{ $reserves->checkin }}</td>
                <td>{{ $reserves->checkout }}</td>
                <td>{{ $reserves->prices }} zł</td>
                <td>{{ $reserves->status_reserve }}</td>
                <td>
                    <?php
                    $checkin = new DateTime($reserves->checkin);
                    $checkout = new DateTime($reserves->checkout);
                    $interval = $checkin->diff($checkout);
                    echo $interval->format('%a');
                    ?>
                </td>
                <td>{{ $reserves->place_type }}</td>
                <td>
                    <form action="{{ route('admin.deletereserve', $reserves->reserve_id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Usuń rekord">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        @if ($reserve->lastPage() > 1)
            <ul class="pagination">
                <li class="page-item {{ ($reserve->currentPage() == 1) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $reserve->appends(request()->except('page'))->previousPageUrl() }}" aria-label="Previous">
                        &laquo;
                    </a>
                </li>

                @for ($i = 1; $i <= $reserve->lastPage(); $i++)
                    <li class="page-item {{ ($reserve->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $reserve->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item {{ ($reserve->currentPage() == $reserve->lastPage()) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $reserve->appends(request()->except('page'))->nextPageUrl() }}" aria-label="Next">
                        &raquo;
                    </a>
                </li>
            </ul>
        @endif
    </div>
</div>
