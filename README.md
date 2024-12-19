1. Tabela: Użytkownicy (uzytkownicy)

    id: unikalny identyfikator użytkownika.
    nazwa_uzytkownika: nazwa użytkownika.
    haslo: hasło (przechowywane w formie zaszyfrowanej).
    email: adres e-mail użytkownika.
    rola: rola użytkownika (administrator, klient, pracownik).
    data_utworzenia: data utworzenia konta.
    data_aktualizacji: data ostatniej modyfikacji konta.

2. Tabela: Koty (koty)

    id: unikalny identyfikator kota.
    nazwa: imię kota.
    rasa: rasa kota.
    wiek: wiek kota.
    kolor: kolor kota.
    plec: płeć kota.
    właściciel_id: klucz obcy do tabeli uzytkownicy, wskazujący właściciela kota.
    opis: opis kota (np. cechy charakterystyczne).
    data_utworzenia: data dodania kota do systemu.

3. Tabela: Wystawy (wystawy)

    id: unikalny identyfikator wystawy.
    nazwa: nazwa wystawy.
    data_rozpoczecia: data rozpoczęcia wystawy.
    data_zakonczenia: data zakończenia wystawy.
    miejsce: miejsce wystawy.
    opis: opis wystawy.
    data_utworzenia: data dodania wystawy.

4. Tabela: Kategorie (kategorie)

    id: unikalny identyfikator kategorii.
    nazwa: nazwa kategorii (np. "Perski", "Maine Coon").
    opis: opis kategorii.

5. Tabela: Oceny (oceny)

    id: unikalny identyfikator oceny.
    kot_id: klucz obcy do tabeli koty, wskazujący oceniany kot.
    wystawa_id: klucz obcy do tabeli wystawy, wskazujący wystawę.
    sedzia_id: klucz obcy do tabeli uzytkownicy, wskazujący sędziego.
    ocena: ocena (np. w skali 1-10).
    komentarze: uwagi sędziego.
    data_oceny: data oceny.

6. Tabela: Bilety (bilety)

    id: unikalny identyfikator biletu.
    klient_id: klucz obcy do tabeli uzytkownicy, wskazujący klienta, który zakupił bilet.
    wystawa_id: klucz obcy do tabeli wystawy, wskazujący wystawę.
    rodzaj_biletu: rodzaj biletu (np. "normalny", "ulgowy").
    cena: cena biletu.
    data_zakupu: data zakupu biletu.

7. Tabela: Zamówienia (zamowienia)

    id: unikalny identyfikator zamówienia.
    klient_id: klucz obcy do tabeli uzytkownicy, wskazujący klienta.
    data_zamowienia: data złożenia zamówienia.
    cena_calkowita: całkowita cena zamówienia.
    status: status zamówienia (np. "oczekujące", "zrealizowane").
    status_platnosci: status płatności (np. "oczekująca", "zapłacona").

8. Tabela: Szczegóły Zamówienia (szczegoly_zamowienia)

    id: unikalny identyfikator szczegółu zamówienia.
    zamowienie_id: klucz obcy do tabeli zamowienia.
    bilet_id: klucz obcy do tabeli bilety.
    ilosc: liczba zakupionych biletów.
    cena: cena jednostkowa biletu.
    cena_calkowita: całkowita cena za ten szczegół zamówienia.

9. Tabela: Pracownicy (pracownicy)

    id: unikalny identyfikator pracownika.
    uzytkownik_id: klucz obcy do tabeli uzytkownicy, wskazujący pracownika.
    rola: rola pracownika (np. "rejestracja", "obsługa klienta").
    data_zatrudnienia: data zatrudnienia pracownika.

10. Tabela: Logi (logi)

    id: unikalny identyfikator logu.
    uzytkownik_id: klucz obcy do tabeli uzytkownicy, wskazujący użytkownika, który wykonał akcję.
    akcja: opis wykonanej akcji (np. "zakupiono bilet", "zarejestrowano kota").
    data_akcji: data wykonania akcji.

11. Tabela: Metody Płatności (metody_platnosci)

    id: unikalny identyfikator metody płatności.
    nazwa: nazwa metody płatności (np. "Karta kredytowa", "PayPal").
    opis: opis metody płatności.

12. Tabela: Sponsorzy (sponsorzy)

    id: unikalny identyfikator sponsora.
    nazwa: nazwa sponsora.
    dane_kontaktowe: dane kontaktowe sponsora.
    wniosek: wysokość wkładu finansowego sponsora.
    data_utworzenia: data dodania sponsora.

Uprawnienia Użytkowników

    Administrator: pełny dostęp do wszystkich funkcji systemu. Może zarządzać użytkownikami, wystawami, kategoriami kotów, ocenami, zamówieniami, pracownikami i logami.
    Klient: użytkownik, który może przeglądać dostępne wystawy, rejestrować koty, przeglądać oceny swoich kotów, zakupić bilety na wystawę oraz zarządzać swoimi zamówieniami.
    Pracownik: użytkownik, który może rejestrować koty na wystawę, obsługiwać zamówienia biletów i oceniać koty. Pracownicy nie mają dostępu do zarządzania użytkownikami ani wystawami.

Frontend i Backend

    Frontend (dla klienta): Widok umożliwiający przeglądanie dostępnych wystaw, zakupu biletów, przeglądania ocen kotów oraz zarządzania swoimi zamówieniami.
    Backend (dla pracowników): Panel administracyjny, w którym pracownicy mogą rejestrować koty, oceniać je, zarządzać zamówieniami biletów i pomagać klientom.

Migracje i Seedery

Migracje i seedery mogą być użyte do automatycznego tworzenia tabel i dodawania przykładowych danych do bazy. Dzięki migracjom, strukturę bazy danych można łatwo zaimplementować i modyfikować. Migracje będą także odpowiedzialne za dodanie przykładowych danych, takich jak konta użytkowników, koty, wystawy czy bilety.
