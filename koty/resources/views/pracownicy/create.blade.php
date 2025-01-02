@extends('layouts.app')

@section('content')
<h1>Dodaj Pracownika</h1>
<form action="{{ route('pracownicy.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="uzytkownik_id">Użytkownik</label>
        <select name="uzytkownik_id" id="uzytkownik_id" class="form-control">
            @foreach($uzytkownicy as $uzytkownik)
            <option value="{{ $uzytkownik->id }}">{{ $uzytkownik->nazwa_uzytkownika }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="rola">Rola</label>
        <input type="text" name="rola" id="rola" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="data_zatrudnienia">Data Zatrudnienia</label>
        <input type="date" name="data_zatrudnienia" id="data_zatrudnienia" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
@endsection
