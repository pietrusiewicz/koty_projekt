<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wystawy Kotów')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- Wstaw w sekcji <head> -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

	<!-- Wstaw przed końcem tagu </body> -->
	
</head>
<body>
	<header>
        <h1><a href="{{ route('home') }}" style="text-decoration: none; color: white;">Aplikacja Laravel</a></h1>
		<nav >
        @if(session('user'))
            @if(session('user')->rola == 'administrator')
                <h3>Panel Admina
                <ul>
                    <li><a href="{{ route('uzytkownicy.index') }}">Użytkownicy</a></li>
                    <li><a href="{{ route('koty.index') }}">Koty</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                    <li><a href="{{ route('kategorie.index') }}">Kategorie</a></li>
                    <li><a href="{{ route('oceny.index') }}">Oceny</a></li>
                    <li><a href="{{ route('bilety.index') }}">Bilety</a></li>
                    <li><a href="{{ route('zamowienia.index') }}">Zamówienia</a></li>
                    <!--<li><a href="{{ route('pracownicy.index') }}">Pracownicy</a></li>-->
                    <li><a href="{{ route('logi.index') }}">Logi</a></li>
                    <li><a href="{{ route('metody-platnosci.index') }}">Metody Płatności</a></li>
                    <li><a href="{{ route('sponsorzy.index') }}">Sponsorzy</a></li>
                </ul></h2>
            @elseif(session('user')->rola == 'klient')
                <h1>Panel Użytkownika</li>
                <ul>
                    <li><a href="{{ route('koty.index') }}">Moje Koty</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                    <li><a href="{{ route('bilety.index') }}">Moje Bilety</a></li>
                    <li><a href="{{ route('zamowienia.index') }}">Moje Zamówienia</a></li>
                </ul></h1>
            @elseif(in_array(session('user')->rola, ['sedzia', 'pracownik']))
                <h1>Panel Pracownika
                <ul >
                    <li><a href="{{ route('koty.index') }}">Koty</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                </ul></h1>
			
            @endif
		@else
				<h1>Gość</h1>
        @endif
		</nav>
        @if(session('user'))
            <div style="text-align: right;color:white;">
                <span>Witaj, {{ session('user')->nazwa_uzytkownika }}!</span>
                <a style="color:white;" href="{{ route('logout') }}">Wyloguj</a>
            </div>
        @else
            <div>
                <a href="{{ route('login.form') }}">Zaloguj</a> | 
                <a href="{{ route('register.form') }}">Zarejestruj</a>
            </div>
        @endif
    </header>
    <button id="increaseFont" class="btn btn-primary">Powiększ czcionkę</button>
    <button id="decreaseFont" class="btn btn-secondary">Pomniejsz czcionkę</button>
    

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 Wystawy Kotów</p>
    </footer>
	
	
	
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainContent = document.querySelector('main');
            let fontSize = 16; // Domyślny rozmiar czcionki

            document.getElementById('increaseFont').addEventListener('click', function () {
                fontSize += 2;
                mainContent.style.fontSize = fontSize + 'px';
            });

            document.getElementById('decreaseFont').addEventListener('click', function () {
                if (fontSize > 10) { // Zapobiega zbyt małej czcionce
                    fontSize -= 2;
                    mainContent.style.fontSize = fontSize + 'px';
                }
            });
        });
    </script>
	
</body>
</html>
