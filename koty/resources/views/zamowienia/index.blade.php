@extends('layouts.app')

@section('content')
<h1>Lista zamówień</h1>
<a href="{{ route('zamowienia.create') }}" class="btn btn-primary">Dodaj zamówienie</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Klient</th>
            <th>Data zamówienia</th>
            <th>Cena całkowita</th>
            <th>Status</th>
            <th>Status płatności</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($zamowienia as $zamowienie)
        <tr>
            <td>{{ $zamowienie->id }}</td>
            <td>{{ $zamowienie->klient->nazwa_uzytkownika }}</td>
            <td>{{ $zamowienie->data_zamowienia }}</td>
            <td>{{ $zamowienie->cena_calkowita }}</td>
            <td>{{ $zamowienie->status }}</td>
            <td>{{ $zamowienie->status_platnosci }}</td>
			@if(session('user')->rola == 'administrator')

            <td>
                <a href="{{ route('zamowienia.edit', $zamowienie->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('zamowienia.destroy', $zamowienie->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#oplacModal{{ $zamowienie->id }}">
						Opłać
					</button>
                    <button type="submit" class="btn btn-danger"  data-dismiss="modal">Usuń</button>
                </form>
            </td>
			@elseif(session('user')->rola == 'klient')
			<td>
				@if($zamowienie->status_platnosci == 'oczekująca')
                    <!-- Przycisk do otwarcia modalu -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#oplacModal{{ $zamowienie->id }}">
						Opłać
					</button>

                @else
                    <span>Opłacone</span>
                @endif
			</td>
			@endif
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal dla każdego zamówienia -->
@foreach($zamowienia as $zamowienie)
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
@endforeach
@endsection
