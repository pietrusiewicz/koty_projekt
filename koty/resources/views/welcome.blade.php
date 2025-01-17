@extends('layouts.app')

@section('title', 'Wystawy Kotów')

@section('content')
    <section class="hero">
        <h1>Witamy na wystawach kotów</h1>
        <p>Znajdź najlepsze koty na wystawach i poznaj różne rasy!</p>
    </section>

    <section class="exhibitions">
        <h2>Nadchodzące Wystawy</h2>
		@foreach($wystawy as $wystawa)

		<div>
		    <h3>{{ $wystawa->nazwa }}</h3>
            <p>{{ $wystawa->data_rozpoczecia }}</p>
            <p>{{ $wystawa->data_zakonczenia }}</p>
			<p>{{ $wystawa->miejsce }}</p>
		</div>
		<hr/>
        @endforeach

    </section>
@endsection
