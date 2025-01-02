@extends('layouts.app')

@section('content')
<h1>Lista Pracowników</h1>
<a href="{{ route('pracownicy.create') }}" class="btn btn-primary">Dodaj Pracownika</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Rola</th>
            <th>Data Zatrudnienia</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pracownicy as $pracownik)
        <tr>
            <td>{{ $pracownik->id }}</td>
            <td>{{ $pracownik->uzytkownik->nazwa_uzytkownika }}</td>
            <td>{{ $pracownik->rola }}</td>
            <td>{{ $pracownik->data_zatrudnienia }}</td>
            <td>
                <a href="{{ route('pracownicy.edit', $pracownik->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('pracownicy.destroy', $pracownik->id) }}" method="POST" style="display: inline-block;">
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
