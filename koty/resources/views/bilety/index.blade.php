@extends('layouts.app')

@section('content')
<h1>Lista biletów</h1>
@if(session('user')->rola == 'administrator')
<a href="{{ route('bilety.create') }}" class="btn btn-primary">Dodaj bilet</a>
@elseif(session('user')->rola == 'klient')
<a href="{{ route('bilety.create') }}" class="btn btn-primary">Kup bilet</a>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Klient</th>
            <th>Wystawa</th>
            <th>Rodzaj biletu</th>
            <th>Cena</th>
            <th>Data zakupu</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bilety as $bilet)
        <tr>
            <td>{{ $bilet->id }}</td>
			
            <td>{{ $bilet->klient->nazwa_uzytkownika ?? 'Brak' }}</td>
            <td>{{ $bilet->wystawa->nazwa ?? 'Brak' }}</td>
            <td>{{ $bilet->rodzaj_biletu }}</td>
            <td>{{ $bilet->cena }}</td>
            <td>{{ $bilet->data_zakupu }}</td>
			@if(session('user')->rola == 'administrator')
				<td>
					<a href="{{ route('bilety.edit', $bilet->id) }}" class="btn btn-warning">Edytuj</a>
					<form action="{{ route('bilety.destroy', $bilet->id) }}" method="POST" style="display: inline-block;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Usuń</button>
					</form>
				</td>
			@elseif(session('user')->rola == 'klient')
				<td>
					<form action="{{ route('bilety.destroy', $bilet->id) }}" method="POST" style="display: inline-block;" id="cancelForm">
						@csrf
						@method('DELETE')
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#anulujBilet{{ $bilet->id }}">
							Anuluj
						</button>
					</form>

				</td>
			@endif
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
@foreach($bilety as $bilet)
<div class="modal fade" id="anulujBilet{{ $bilet->id }}" tabindex="-1" role="dialog" aria-labelledby="anulujModalLabel{{ $bilet->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anulujModalLabel{{ $bilet->id }}">Anuluj Bilet #{{ $bilet->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bilety.destroy', $bilet->id) }}" method="POST" style="display: inline-block;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Usuń</button>
				</form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    $('#deleteForm').on('submit', function (e) {
        e.preventDefault(); // Zapobiegamy domyślnej akcji formularza
        $(this).off('submit').submit(); // Usuwamy nasłuchiwanie i wysyłamy formularz
    });
</script>

@endsection
