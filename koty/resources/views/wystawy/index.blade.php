@extends('layouts.app')

@section('content')
<h1>Wystawy</h1>

@if(in_array(session('user')->rola, ['administrator', 'pracownik']))
<a href="{{ route('wystawy.create') }}" class="btn btn-primary">Dodaj wystawę</a>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Miejsce</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wystawy as $wystawa)
        <tr>
            <td>{{ $wystawa->id }}</td>
            <td>{{ $wystawa->nazwa }}</td>
            <td>{{ $wystawa->data_rozpoczecia }}</td>
            <td>{{ $wystawa->data_zakonczenia }}</td>
            <td>{{ $wystawa->miejsce }}</td>
            <td>
				@if(in_array(session('user')->rola, ['administrator', 'pracownik']))
                <a href="{{ route('wystawy.edit', $wystawa->id) }}" class="btn btn-warning">Edytuj</a>
                <form action="{{ route('wystawy.destroy', $wystawa->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </form>
				@endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
