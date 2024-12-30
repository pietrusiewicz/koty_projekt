@extends('layouts.app')

@section('content')
<h1>Dodaj metodę płatności</h1>
<form action="{{ route('metody-platnosci.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nazwa">Nazwa</label>
        <input type="text" name="nazwa" id="nazwa" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="opis">Opis</label>
        <textarea name="opis" id="opis" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
@endsection
