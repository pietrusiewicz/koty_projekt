@extends('layouts.app')

@section('content')
<div class="modal fade" id="oplacModal{{ $zamowienie->id }}" tabindex="-1" role="dialog" aria-labelledby="oplacModalLabel{{ $zamowienie->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="oplacModalLabel{{ $zamowienie->id }}">Opłać Zamówienie #{{ $zamowienie->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('zamowienia.oplac', $zamowienie->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="rodzaj_platnosci">Rodzaj płatności</label>
                        <select name="rodzaj_platnosci" id="rodzaj_platnosci" class="form-control" required>
                            <option value="Karta kredytowa">Karta kredytowa</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Przelew bankowy">Przelew bankowy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kwota">Kwota</label>
                        <input type="text" class="form-control" id="kwota" name="kwota" value="{{ $zamowienie->cena_calkowita }}" disabled>
                    </div>
                    <button type="submit" class="btn btn-success">Opłać</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
