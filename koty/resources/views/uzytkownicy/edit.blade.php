@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj użytkownika</h1>
    <form action="{{ route('uzytkownicy.update', $uzytkownik->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nazwa_uzytkownika">Nazwa użytkownika</label>
            <input type="text" name="nazwa_uzytkownika" id="nazwa_uzytkownika" class="form-control" value="{{ $uzytkownik->nazwa_uzytkownika }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $uzytkownik->email }}" required>
        </div>
		<div class="form-group">
            <label>Hasło (minimum 6 znaków)</label>
            <input type="password" name="haslo" class="form-control">
        </div>
        <div class="form-group">
            <label for="rola">Rola</label>
            <select name="rola" id="rola" class="form-control">
                <option value="administrator" {{ $uzytkownik->rola == 'administrator' ? 'selected' : '' }}>Administrator</option>
                <option value="klient" {{ $uzytkownik->rola == 'klient' ? 'selected' : '' }}>Klient</option>
                <option value="pracownik" {{ $uzytkownik->rola == 'pracownik' ? 'selected' : '' }}>Pracownik</option>
				<option value="sedzia" {{ $uzytkownik->rola == 'sedzia' ? 'selected' : '' }}>Sędzia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>
@endsection
