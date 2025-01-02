@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Witaj w systemie Wystaw Kotów!</h1>
        <p>Wybierz jedną z poniższych opcji, aby zarządzać różnymi funkcjami aplikacji.</p>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Użytkownicy</h3>
                    </div>
                    <div class="card-body">
                        <p>Przeglądaj i zarządzaj użytkownikami w systemie.</p>
                        <a href="{{ route('uzytkownicy.index') }}" class="btn btn-primary">Zarządzaj użytkownikami</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Koty</h3>
                    </div>
                    <div class="card-body">
                        <p>Dodaj nowe koty, przeglądaj istniejące lub edytuj dane kotów.</p>
                        <a href="{{ route('koty.index') }}" class="btn btn-primary">Zarządzaj kotami</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Wystawy</h3>
                    </div>
                    <div class="card-body">
                        <p>Twórz, przeglądaj i zarządzaj wystawami kotów.</p>
                        <a href="{{ route('wystawy.index') }}" class="btn btn-primary">Zarządzaj wystawami</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Oceny</h3>
                    </div>
                    <div class="card-body">
                        <p>Przeglądaj oceny kotów z wystaw i dodawaj komentarze.</p>
                        <a href="{{ route('oceny.index') }}" class="btn btn-primary">Zarządzaj ocenami</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Bilety</h3>
                    </div>
                    <div class="card-body">
                        <p>Sprzedawaj bilety na wystawy oraz przeglądaj zamówienia.</p>
                        <a href="{{ route('bilety.index') }}" class="btn btn-primary">Zarządzaj biletami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
