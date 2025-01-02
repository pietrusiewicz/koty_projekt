# README - Struktura bazy danych aplikacji "Wystawy Kotów"

## Tabele bazy danych

### 1. Tabela: **Użytkownicy (uzytkownicy)**
- **id**: Unikalny identyfikator użytkownika.
- **nazwa_uzytkownika**: Nazwa użytkownika.
- **haslo**: Hasło użytkownika (przechowywane w formie zaszyfrowanej).
- **email**: Adres e-mail użytkownika.
- **rola**: Rola użytkownika (administrator, klient, pracownik).
- **data_utworzenia**: Data utworzenia konta.
- **data_aktualizacji**: Data ostatniej modyfikacji konta.

### 2. Tabela: **Koty (koty)**
- **id**: Unikalny identyfikator kota.
- **nazwa**: Imię kota.
- **rasa**: Rasa kota.
- **wiek**: Wiek kota.
- **kolor**: Kolor kota.
- **plec**: Płeć kota.
- **właściciel_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący właściciela kota.
- **opis**: Opis kota (np. cechy charakterystyczne).
- **data_utworzenia**: Data dodania kota do systemu.

### 3. Tabela: **Wystawy (wystawy)**
- **id**: Unikalny identyfikator wystawy.
- **nazwa**: Nazwa wystawy.
- **data_rozpoczecia**: Data rozpoczęcia wystawy.
- **data_zakonczenia**: Data zakończenia wystawy.
- **miejsce**: Miejsce wystawy.
- **opis**: Opis wystawy.
- **data_utworzenia**: Data dodania wystawy.

### 4. Tabela: **Kategorie (kategorie)**
- **id**: Unikalny identyfikator kategorii.
- **nazwa**: Nazwa kategorii (np. "Perski", "Maine Coon").
- **opis**: Opis kategorii.

### 5. Tabela: **Oceny (oceny)**
- **id**: Unikalny identyfikator oceny.
- **kot_id**: Klucz obcy do tabeli `koty`, wskazujący oceniany kot.
- **wystawa_id**: Klucz obcy do tabeli `wystawy`, wskazujący wystawę.
- **sedzia_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący sędziego.
- **ocena**: Ocena (np. w skali 1-10).
- **komentarze**: Uwagi sędziego.
- **data_oceny**: Data oceny.

### 6. Tabela: **Bilety (bilety)**
- **id**: Unikalny identyfikator biletu.
- **klient_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący klienta, który zakupił bilet.
- **wystawa_id**: Klucz obcy do tabeli `wystawy`, wskazujący wystawę.
- **rodzaj_biletu**: Rodzaj biletu (np. "normalny", "ulgowy").
- **cena**: Cena biletu.
- **data_zakupu**: Data zakupu biletu.

### 7. Tabela: **Zamówienia (zamowienia)**
- **id**: Unikalny identyfikator zamówienia.
- **klient_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący klienta.
- **data_zamowienia**: Data złożenia zamówienia.
- **cena_calkowita**: Całkowita cena zamówienia.
- **status**: Status zamówienia (np. "oczekujące", "zrealizowane").
- **status_platnosci**: Status płatności (np. "oczekująca", "zapłacona").

### 8. Tabela: **Szczegóły Zamówienia (szczegoly_zamowienia)**
- **id**: Unikalny identyfikator szczegółu zamówienia.
- **zamowienie_id**: Klucz obcy do tabeli `zamowienia`.
- **bilet_id**: Klucz obcy do tabeli `bilety`.
- **ilosc**: Liczba zakupionych biletów.
- **cena**: Cena jednostkowa biletu.
- **cena_calkowita**: Całkowita cena za ten szczegół zamówienia.

### 9. Tabela: **Pracownicy (pracownicy)**
- **id**: Unikalny identyfikator pracownika.
- **uzytkownik_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący pracownika.
- **rola**: Rola pracownika (np. "rejestracja", "obsługa klienta").
- **data_zatrudnienia**: Data zatrudnienia pracownika.

### 10. Tabela: **Logi (logi)**
- **id**: Unikalny identyfikator logu.
- **uzytkownik_id**: Klucz obcy do tabeli `uzytkownicy`, wskazujący użytkownika, który wykonał akcję.
- **akcja**: Opis wykonanej akcji (np. "zakupiono bilet", "zarejestrowano kota").
- **data_akcji**: Data wykonania akcji.

### 11. Tabela: **Metody Płatności (metody_platnosci)**
- **id**: Unikalny identyfikator metody płatności.
- **nazwa**: Nazwa metody płatności (np. "Karta kredytowa", "PayPal").
- **opis**: Opis metody płatności.

### 12. Tabela: **Sponsorzy (sponsorzy)**
- **id**: Unikalny identyfikator sponsora.
- **nazwa**: Nazwa sponsora.
- **dane_kontaktowe**: Dane kontaktowe sponsora.
- **wniosek**: Wysokość wkładu finansowego sponsora.
- **data_utworzenia**: Data dodania sponsora.

---

## Podsumowanie
W powyższej strukturze bazy danych zostały uwzględnione wszystkie niezbędne tabele i zależności między nimi, które wspierają funkcjonalności aplikacji związanej z wystawami kotów, zarządzaniem użytkownikami, biletami, zamówieniami oraz ocenami kotów.
