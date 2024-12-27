FROM php:8.2-cli

# Instalacja narzędzi systemowych, Composer i SQLite
RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite

# Instalacja Composera
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ustawienie katalogu roboczego
WORKDIR /app
