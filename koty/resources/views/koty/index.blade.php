@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista kotów</h1>
    <a href="{{ route('koty.create') }}" class="btn btn-primary mb-3">Dodaj kota</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nazwa</th>
				<th>Rasa</th>
				<th>Wiek</th>
				<th>Kolor</th>
				<th>Płeć</th>
				<th>Właściciel</th>
				<th>Kategoria</th>
				<th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($koty as $kot)
                <tr>
                    <td>{{ $kot->nazwa }}</td>
					<td>{{ $kot->rasa }}</td>
					<td>{{ $kot->wiek }}</td>
					<td>{{ $kot->kolor }}</td>
					<td>{{ $kot->plec }}</td>
					<td>{{ $uzytkownicy->find($kot->wlasciciel_id)->nazwa_uzytkownika }}</td>
					<td>{{ $kategorie->find($kot->kategoria_id)->nazwa }}</td>
					<td>
						<a href="{{ route('koty.edit', $kot->id) }}" class="btn btn-warning">Edytuj</a>
						<form action="{{ route('koty.destroy', $kot->id) }}" method="POST" style="display:inline;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Usuń</button>
						</form>
					</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
