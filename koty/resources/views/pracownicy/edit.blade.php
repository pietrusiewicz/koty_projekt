@extends('layouts.app')

@section('content')
<h1>Edytuj Pracownika</h1>
<form action="{{ route('pracownicy.update', $pracownik->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="uzytkownik_id">Użytkownik</label>
        <select name="uzytkownik_id" id="uzytkownik_id" class="form-control">
            @foreach($uzytkownicy as $uzytkownik)
            <option value="{{ $uzytkownik->id }}" {{ $pracownik->uzytkownik_id == $uzytkownik->id ? 'selected' : '' }}>
                {{ $uzytkownik->nazwa_uzytkownika }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="rola">Rola</label>
        <input type="text" name="rola" id="rola" class="form-control" value="{{ $pracownik->rola }}" required>
    </div>
    <div class="form-group">
        <label for="data_zatrudnienia">Data Zatrudnienia</label>
        <input type="date" name="data_zatrudnienia" id="data_zatrudnienia" class="form-control" value="{{ $pracownik->data_zatrudnienia }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
@endsection
