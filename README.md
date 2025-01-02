# Uruchomienie aplikacji Laravel za pomocą Dockera

## Wymagania wstępne:
- Zainstalowany Docker na komputerze.

## Instrukcja krok po kroku:

### 0. Zbudowanie obrazu Docker
Zbuduj obraz Docker za pomocą poniższego polecenia:<br/>
```bash docker build -t laravel-container .```

### 1. Uruchomienie kontenera Docker z aplikacją Laravel

Uruchom kontener Docker, mapując port 8000 oraz montując katalog roboczy:<br/>
```docker run -d -p 8000:8000 -v "$(pwd):/app" --name laravel-container -it laravel-sqlite```

### 2. Wejście do kontenera

Wejdź do kontenera, aby wykonać polecenia wewnątrz środowiska kontenera:<br/>
```docker exec -it laravel-container bash```

### 3. Tworzenie projektu Laravel

Wewnątrz kontenera wykonaj następujące polecenia:
<code>
mkdir koty
mkdir koty2 && mv koty koty2
composer create-project --prefer-dist laravel/laravel koty
mv koty2 koty
</code>

### 4. Uruchomienie aplikacji Laravel

W kontenerze uruchom serwer aplikacji Laravel:<br/>
```php artisan serve --port=8000 --host=0.0.0.0```
