@extends('layouts.app')

@section('content')
@if(session('user')->rola == 'administrator')
<h1>Dodaj bilet</h1>
@elseif(session('user')->rola == 'klient')
<h1>Kup bilet</h1>
@endif
<form action="{{ route('bilety.store') }}" method="POST">
    @csrf
	@if(session('user')->rola == 'administrator')
    <div class="form-group">
        <label for="klient_id">Klient</label>
        <select name="klient_id" id="klient_id" class="form-control">
            @foreach($klienci as $klient)
            <option value="{{ $klient->id }}">{{ $klient->nazwa_uzytkownika }}</option>
            @endforeach
        </select>
    </div>
	@endif
    <div class="form-group">
        <label for="wystawa_id">Wystawa</label>
        <select name="wystawa_id" id="wystawa_id" class="form-control">
		<option value="">--wybierz wystawe--</option>
            @foreach($wystawy as $wystawa)
            <option value="{{ $wystawa->id }}">{{ $wystawa->nazwa }}</option>
            @endforeach
        </select>
    </div>
	<div class="form-group">
        <label for="rodzaj_biletu">Rodzaj biletu</label>
        <select name="rodzaj_biletu" id="rodzaj_biletu" class="form-control" onchange="updateCena()">
            <option value="">-- Wybierz bilet --</option>
            @foreach($rodzaje_biletow as $rodzaj => $cena)
                <option value="{{ $rodzaj }}" data-cena="{{ $cena }}">{{ ucfirst($rodzaj) }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="cena">Cena</label>
        <input type="number" name="cena" id="cena" class="form-control" step="0.01" disabled>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
<script>
    // Funkcja do aktualizacji ceny na podstawie wybranego biletu
    function updateCena() {
        var select = document.getElementById('rodzaj_biletu');
        var cenaInput = document.getElementById('cena');
        var selectedOption = select.options[select.selectedIndex];
        var cena = selectedOption ? selectedOption.getAttribute('data-cena') : '';

        cenaInput.value = cena;
    }
</script>
@endsection
