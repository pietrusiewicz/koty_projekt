@extends('layouts.app')

@section('content')
<h1>Oceny</h1>
<a href="{{ route('oceny.create') }}" class="btn btn-primary">Dodaj ocenę</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Kot</th>
            <th>Wystawa</th>
            <th>Sędzia</th>
            <th>Ocena</th>
            <th>Komentarze</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($oceny as $ocena)
        <tr>
            <td>{{ $ocena->id }}</td>
            <td>{{ $ocena->kot->nazwa }}</td>
            <td>{{ $ocena->wystawa->nazwa }}</td>
            <td>{{ $ocena->sedzia->nazwa_uzytkownika }}</td>
            <td>{{ $ocena->ocena }}</td>
            <td>{{ $ocena->komentarze }}</td>
            <td>
                <a href="{{ route('oceny.edit', $ocena->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('oceny.destroy', $ocena->id) }}" method="POST" style="display:inline;">
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
