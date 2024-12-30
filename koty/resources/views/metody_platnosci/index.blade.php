@extends('layouts.app')

@section('content')
<h1>Metody Płatności</h1>
<a href="{{ route('metody-platnosci.create') }}" class="btn btn-primary mb-3">Dodaj metodę płatności</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($metodyPlatnosci as $metoda)
        <tr>
            <td>{{ $metoda->id }}</td>
            <td>{{ $metoda->nazwa }}</td>
            <td>{{ $metoda->opis }}</td>
            <td>
                <a href="{{ route('metody-platnosci.edit', $metoda->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('metody-platnosci.destroy', $metoda->id) }}" method="POST" style="display:inline;">
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
