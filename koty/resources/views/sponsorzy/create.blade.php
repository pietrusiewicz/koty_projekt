@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj Sponsora</h1>
    <form action="{{ route('sponsorzy.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nazwa" class="form-label">Nazwa</label>
            <input type="text" name="nazwa" class="form-control" id="nazwa" required>
        </div>
        <div class="mb-3">
            <label for="dane_kontaktowe" class="form-label">Dane Kontaktowe</label>
            <textarea name="dane_kontaktowe" class="form-control" id="dane_kontaktowe" required></textarea>
        </div>
        <div class="mb-3">
            <label for="wniosek" class="form-label">Wkład Finansowy</label>
            <input type="number" step="0.01" name="wniosek" class="form-control" id="wniosek">
        </div>
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </form>
</div>
@endsection
