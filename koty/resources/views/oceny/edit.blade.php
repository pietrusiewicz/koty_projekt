@extends('layouts.app')

@section('content')
<h1>Edytuj ocenę</h1>
<form action="{{ route('oceny.update', $ocena->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Używamy metody PUT dla aktualizacji -->
    
    <div class="form-group">
        <label for="kot_id">Kot</label>
        <select name="kot_id" id="kot_id" class="form-control" required>
		<option value="">-- Wybierz kota --</option>
            @foreach($koty as $kot)
            <option value="{{ $kot->id }}" {{ $kot->id == $ocena->kot_id ? 'selected' : '' }}>
                {{ $kot->nazwa }}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="wystawa_id">Wystawa</label>
        <select name="wystawa_id" id="wystawa_id" class="form-control" required>
            @foreach($wystawy as $wystawa)
			<option value="">-- Wybierz wystawę --</option>
			<option value="{{ $wystawa->id }}" {{ $wystawa->id == $ocena->wystawa_id ? 'selected' : '' }}>
                {{ $wystawa->nazwa }}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="sedzia_id">Sędzia</label>
        <select name="sedzia_id" id="sedzia_id" class="form-control" required>
			<option value="">-- Wybierz sędziego --</option>
			@foreach($sedziowie as $sedzia)
            <option value="{{ $sedzia->id }}" {{ $sedzia->id == $ocena->sedzia_id ? 'selected' : '' }}>
                {{ $sedzia->nazwa_uzytkownika }}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="ocena">Ocena</label>
        <input type="number" name="ocena" id="ocena" class="form-control" min="1" max="10" value="{{ old('ocena', $ocena->ocena) }}" required>
    </div>
    
    <div class="form-group">
        <label for="komentarze">Komentarze</label>
        <textarea name="komentarze" id="komentarze" class="form-control">{{ old('komentarze', $ocena->komentarze) }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
</form>
@endsection
