@extends('layouts.app')

@section('content')
<h1>Lista biletów</h1>
<a href="{{ route('bilety.create') }}" class="btn btn-primary">Dodaj bilet</a>
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
            <td>
                <a href="{{ route('bilety.edit', $bilet->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('bilety.destroy', $bilet->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
