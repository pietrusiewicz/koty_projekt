@extends('layouts.app')

@section('content')
<h1>Edytuj metodę płatności</h1>
<form action="{{ route('metody-platnosci.update', $metodyPlatnosci->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nazwa">Nazwa</label>
        <input type="text" name="nazwa" id="nazwa" class="form-control" value="{{ $metodyPlatnosci->nazwa }}" required>
    </div>
    <div class="form-group">
        <label for="opis">Opis</label>
        <textarea name="opis" id="opis" class="form-control">{{ $metodyPlatnosci->opis }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Zaktualizuj</button>
</form>
@endsection
