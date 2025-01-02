@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Logowanie</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj</button>
    </form>
</div>
@endsection
