===projekt_koty===

    Tabela: Użytkownicy (uzytkownicy)

    id: unikalny identyfikator użytkownika. nazwa_uzytkownika: nazwa użytkownika. haslo: hasło (przechowywane w formie zaszyfrowanej). email: adres e-mail użytkownika. rola: rola użytkownika (administrator, klient, pracownik). data_utworzenia: data utworzenia konta. data_aktualizacji: data ostatniej modyfikacji konta.

    Tabela: Koty (koty)

    id: unikalny identyfikator kota. nazwa: imię kota. rasa: rasa kota. wiek: wiek kota. kolor: kolor kota. plec: płeć kota. właściciel_id: klucz obcy do tabeli uzytkownicy, wskazujący właściciela kota. opis: opis kota (np. cechy charakterystyczne). data_utworzenia: data dodania kota do systemu.

    Tabela: Wystawy (wystawy)

    id: unikalny identyfikator wystawy. nazwa: nazwa wystawy. data_rozpoczecia: data rozpoczęcia wystawy. data_zakonczenia: data zakończenia wystawy. miejsce: miejsce wystawy. opis: opis wystawy. data_utworzenia: data dodania wystawy.

    Tabela: Kategorie (kategorie)

    id: unikalny identyfikator kategorii. nazwa: nazwa kategorii (np. "Perski", "Maine Coon"). opis: opis kategorii.

    Tabela: Oceny (oceny)

    id: unikalny identyfikator oceny. kot_id: klucz obcy do tabeli koty, wskazujący oceniany kot. wystawa_id: klucz obcy do tabeli wystawy, wskazujący wystawę. sedzia_id: klucz obcy do tabeli uzytkownicy, wskazujący sędziego. ocena: ocena (np. w skali 1-10). komentarze: uwagi sędziego. data_oceny: data oceny.

    Tabela: Bilety (bilety)

    id: unikalny identyfikator biletu. klient_id: klucz obcy do tabeli uzytkownicy, wskazujący klienta, który zakupił bilet. wystawa_id: klucz obcy do tabeli wystawy, wskazujący wystawę. rodzaj_biletu: rodzaj biletu (np. "normalny", "ulgowy"). cena: cena biletu. data_zakupu: data zakupu biletu.

    Tabela: Zamówienia (zamowienia)

    id: unikalny identyfikator zamówienia. klient_id: klucz obcy do tabeli uzytkownicy, wskazujący klienta. data_zamowienia: data złożenia zamówienia. cena_calkowita: całkowita cena zamówienia. status: status zamówienia (np. "oczekujące", "zrealizowane"). status_platnosci: status płatności (np. "oczekująca", "zapłacona").

    Tabela: Szczegóły Zamówienia (szczegoly_zamowienia)

    id: unikalny identyfikator szczegółu zamówienia. zamowienie_id: klucz obcy do tabeli zamowienia. bilet_id: klucz obcy do tabeli bilety. ilosc: liczba zakupionych biletów. cena: cena jednostkowa biletu. cena_calkowita: całkowita cena za ten szczegół zamówienia.

    Tabela: Pracownicy (pracownicy)

    id: unikalny identyfikator pracownika. uzytkownik_id: klucz obcy do tabeli uzytkownicy, wskazujący pracownika. rola: rola pracownika (np. "rejestracja", "obsługa klienta"). data_zatrudnienia: data zatrudnienia pracownika.

    Tabela: Logi (logi)

    id: unikalny identyfikator logu. uzytkownik_id: klucz obcy do tabeli uzytkownicy, wskazujący użytkownika, który wykonał akcję. akcja: opis wykonanej akcji (np. "zakupiono bilet", "zarejestrowano kota"). data_akcji: data wykonania akcji.

    Tabela: Metody Płatności (metody_platnosci)

    id: unikalny identyfikator metody płatności. nazwa: nazwa metody płatności (np. "Karta kredytowa", "PayPal"). opis: opis metody płatności.

    Tabela: Sponsorzy (sponsorzy)

    id: unikalny identyfikator sponsora. nazwa: nazwa sponsora. dane_kontaktowe: dane kontaktowe sponsora. wniosek: wysokość wkładu finansowego sponsora. data_utworzenia: data dodania sponsora.
