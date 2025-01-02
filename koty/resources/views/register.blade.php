@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rejestracja</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nazwa_uzytkownika">Nazwa użytkownika</label>
            <input type="text" name="nazwa_uzytkownika" id="nazwa_uzytkownika" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Zarejestruj</button>
    </form>
</div>
@endsection
