<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projekt Koty')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- Nagłówek -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Projekt Koty</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('koty.index') }}">Koty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wystawy.index') }}">Wystawy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategorie.index') }}">Kategorie</a>
                    </li>
                    <!-- Dodaj inne menu, jeśli potrzeba -->
                </ul>
            </div>
        </nav>

        <!-- Treść strony -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Stopka -->
    <footer class="bg-light text-center py-3 mt-4">
        &copy; 2024 Projekt Koty. Wszystkie prawa zastrzeżone.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
