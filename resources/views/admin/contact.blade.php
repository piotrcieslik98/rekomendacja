@extends('layout')

@section('content')
    <div class="container" style="background-color: #F3F3F4; min-height: 100vh;">
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

        <h1 class="mt-4 mb-4 text-center">Panel Administratora - Kontakty</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Temat</th>
                <th>Wiadomość</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                    <td>{{ $contact->topic }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <form action="{{ route('admin.deletecontact', $contact->id) }}" method="POST">
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
            {{ $contacts->links() }}
        </div>
    </div>
@endsection
