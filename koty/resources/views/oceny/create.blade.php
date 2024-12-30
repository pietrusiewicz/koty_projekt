@extends('layouts.app')

@section('content')
<h1>Dodaj ocenę</h1>
<form action="{{ route('oceny.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kot_id">Kot</label>
        <select name="kot_id" id="kot_id" class="form-control" required>
		<option value="">-- Wybierz kota --</option>
            @foreach($koty as $kot)
            <option value="{{ $kot->id }}">{{ $kot->nazwa }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="wystawa_id">Wystawa</label>
        <select name="wystawa_id" id="wystawa_id" class="form-control" required>
			<option value="">-- Wybierz wystawę --</option>
            @foreach($wystawy as $wystawa)
            <option value="{{ $wystawa->id }}">{{ $wystawa->nazwa }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sedzia_id">Sędzia</label>
        <select name="sedzia_id" id="sedzia_id" class="form-control" required>
			<option value="">-- Wybierz sędziego --</option>
            @foreach($sedziowie as $sedzia)
            <option value="{{ $sedzia->id }}">{{ $sedzia->nazwa_uzytkownika }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ocena">Ocena</label>
        <input type="number" name="ocena" id="ocena" class="form-control" min="1" max="10" required>
    </div>
    <div class="form-group">
        <label for="komentarze">Komentarze</label>
        <textarea name="komentarze" id="komentarze" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
@endsection
