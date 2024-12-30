@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj kota</h1>
    <form action="{{ route('koty.update', $kot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nazwa">Nazwa kota</label>
            <input type="text" name="nazwa" id="nazwa" class="form-control" value="{{ $kot->nazwa }}" required>
        </div>
        <div class="form-group">
            <label for="rasa">Rasa</label>
            <input type="text" name="rasa" id="rasa" class="form-control" value="{{ $kot->rasa }}" required>
        </div>
        <div class="form-group">
            <label for="wiek">Wiek</label>
            <input type="number" name="wiek" id="wiek" class="form-control" value="{{ $kot->wiek }}" required>
        </div>
        <div class="form-group">
            <label for="kolor">Kolor</label>
            <input type="text" name="kolor" id="kolor" class="form-control" value="{{ $kot->kolor }}" required>
        </div>
        <div class="form-group">
			<label for="plec">Płeć</label>
			<select name="plec" id="plec" class="form-control" required>
				<option value="m" {{ old('plec') == 'm' ? 'selected' : '' }}>Męski</option>
				<option value="f" {{ old('plec') == 'f' ? 'selected' : '' }}>Żeński</option>
			</select>
		</div>
        <div class="form-group">
            <label for="wlaściciel_id">Właściciel</label>
            <select name="wlasciciel_id" id="wlasciciel_id" class="form-control" required>
				<option value="">-- Wybierz właściciela --</option>
                @foreach($uzytkownicy as $uzytkownik)
                    
					<option value="{{ $uzytkownik->id }}" {{$kot->wlasciciel_id == $uzytkownik->id ? 'selected' : ''}}>
                    {{ $uzytkownik->nazwa_uzytkownika }}
                </option>
                @endforeach
            </select>
        </div>
		<div class="form-group">
        <label for="kategoria_id">Kategoria</label>
        <select name="kategoria_id" id="kategoria_id" class="form-control">
			<option value="">-- Wybierz kategorię --</option>
			@foreach($kategorie as $kategoria)
				<option value="{{ $kategoria->id }}" {{$kot->kategoria_id == $kategoria->id ? 'selected' : ''}} > {{$kategoria->nazwa }}</option>
            @endforeach
        </select>
    </div>
		
        <div class="form-group">
            <label for="opis">Opis</label>
            <textarea name="opis" id="opis" class="form-control">{{ $kot->opis }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>
@endsection
