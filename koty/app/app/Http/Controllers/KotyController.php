<?php
namespace App\Http\Controllers;

use App\Models\Kot;
use App\Models\Uzytkownik;
use App\Models\Kategorie;
use Illuminate\Http\Request;

class KotyController extends Controller
{
    // Wyświetlanie wszystkich kotów
    public function index()
	{
		$koty = Kot::all(); // Eager loading
		$uzytkownicy = Uzytkownik::all();
		$kategorie = Kategorie::all();
		return view('koty.index', compact('koty', 'uzytkownicy', 'kategorie'));
	}

    // Wyświetlanie formularza do dodania kota
    public function create()
    {
        $uzytkownicy = Uzytkownik::all();  // Pobieramy wszystkich użytkowników
		$kategorie = Kategorie::all();  // Pobieramy wszystkich użytkowników
        return view('koty.create', compact('uzytkownicy', 'kategorie'));
    }

    // Zapisywanie nowego kota do bazy danych
    public function store(Request $request)
	{
		// Walidacja danych z formularza
		$validated = $request->validate([
			'nazwa' => 'required|string|max:255',
			'rasa' => 'required|string|max:255',
			'wiek' => 'required|integer|min:0',
			'kolor' => 'required|string|max:255',
			'plec' => 'required|in:m,f', // 'm' lub 'f'
			'wlasciciel_id' => 'required|exists:uzytkownicy,id', // Sprawdza, czy właściciel istnieje
			'kategoria_id' => 'nullable|exists:kategorie,id',
			'opis' => 'nullable|string',
		]);

		// Jeśli walidacja przejdzie, zapisz dane do bazy
		Kot::create([
			'nazwa' => $validated['nazwa'],
			'rasa' => $validated['rasa'],
			'wiek' => $validated['wiek'],
			'kolor' => $validated['kolor'],
			'plec' => $validated['plec'],
			'wlasciciel_id' => $validated['wlasciciel_id'],
			'kategoria_id' => $validated['kategoria_id'],
			'opis' => $validated['opis'],
		]);

		// Przekierowanie z komunikatem sukcesu
		return redirect()->route('koty.index')->with('success', 'Kot został dodany.');
	}
	public function edit($id)
    {
		$uzytkownicy = Uzytkownik::all();  // Pobieramy wszystkich użytkowników
		$kategorie = Kategorie::all();
		$kot = Kot::findOrFail($id);  // Pobieramy użytkownika po id
        return view('koty.edit', compact('kot', 'uzytkownicy','kategorie'));  // Przekazujemy do widoku
    }

	public function update(Request $request, $id)
	{
		$kot = Kot::findOrFail($id);
		
		// Walidacja danych
		$validated = $request->validate([
			'nazwa' => 'required|string|max:255',
			'rasa' => 'required|string|max:255',
			'wiek' => 'required|integer',
			'kolor' => 'required|string|max:255',
			'plec' => 'required|in:m,f',
			'wlasciciel_id' => 'required|exists:uzytkownicy,id',  // Sprawdź, czy poprawna nazwa pola
			'opis' => 'nullable|string',
		]);

		// Przypisanie nowych danych do obiektu
		$kot->nazwa = $validated['nazwa'];
		$kot->rasa = $validated['rasa'];
		$kot->wiek = $validated['wiek'];
		$kot->kolor = $validated['kolor'];
		$kot->plec = $validated['plec'];
		$kot->wlasciciel_id = $validated['wlasciciel_id'];
		$kot->opis = $validated['opis'];

		// Zapisanie zmian
		$kot->save();

		return redirect()->route('koty.index')->with('success', 'Dane kota zostały zaktualizowane.');
	}


    // Usuwanie kota
    public function destroy($id)
    {
        $kot = Kot::findOrFail($id);  // Pobieramy kota po id
        $kot->delete();  // Usuwamy kota

        return redirect()->route('koty.index');  // Przekierowujemy na stronę listy kotów
    }
}
