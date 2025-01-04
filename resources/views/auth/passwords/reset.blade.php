@extends('layout')

@section('content')
    <div class="container">
        <h2>Ustaw nowe hasło</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group mb-3">
                <label for="email">Adres e-mail</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="password">Nowe hasło</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="password-confirm">Potwierdź hasło</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Zresetuj hasło</button>
        </form>
    </div>
@endsection
