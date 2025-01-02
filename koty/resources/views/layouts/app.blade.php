<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wystawy Kotów')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav role="navigation" aria-label="Main navigation">
            <ul>
			
                <li><a href="{{ url('/') }}">Strona Główna</a></li>
                <li><a href="{{ url('/wystawy') }}">Wystawy</a></li>
                <li><a href="{{ url('/kategorie') }}">Kategorie</a></li>
                <li><a href="{{ url('/kontakt') }}">Kontakt</a></li>
				
				@if(session('user'))
					<div style="text-align: right;">
						<span style="color:white">Witaj, {{ session('user') }}!</span>
						<form action="{{ route('logout') }}" method="POST" style="display: inline;">
							@csrf
							<li><a href="{{ route('logout') }}">Wyloguj</a></li>
						</form>
					</div>
				@else
					<div>
						<li><a href="{{ route('login.form') }}">Zaloguj</a></li>
						<li><a href="{{ route('register.form') }}">Zarejestruj</a></li>
					</div>
				@endif
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 Wystawy Kotów</p>
    </footer>
</body>
</html>
