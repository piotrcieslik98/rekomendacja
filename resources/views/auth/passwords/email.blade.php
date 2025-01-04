@extends('layout')

@section('content')
    <div class="container">
        <h2>Resetowanie hasła</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Adres e-mail</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Wyślij link resetujący hasło</button>
        </form>
    </div>
@endsection
