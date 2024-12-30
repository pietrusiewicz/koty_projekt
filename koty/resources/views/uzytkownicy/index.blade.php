@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista użytkowników</h1>
    <a href="{{ route('uzytkownicy.create') }}" class="btn btn-primary mb-3">Dodaj użytkownika</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa użytkownika</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uzytkownicy as $uzytkownik)
                <tr>
                    <td>{{ $uzytkownik->id }}</td>
                    <td>{{ $uzytkownik->nazwa_uzytkownika }}</td>
                    <td>{{ $uzytkownik->email }}</td>
                    <td>{{ ucfirst($uzytkownik->rola) }}</td>
                    <td>
                        <a href="{{ route('uzytkownicy.edit', $uzytkownik->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('uzytkownicy.destroy', $uzytkownik->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
