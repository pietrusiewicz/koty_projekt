@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Witaj, {{ auth()->user()->nazwa_uzytkownika }}!</h1>
    <p>Jesteś zalogowany jako: {{ auth()->user()->rola }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Wyloguj</button>
    </form>
</div>
@endsection
