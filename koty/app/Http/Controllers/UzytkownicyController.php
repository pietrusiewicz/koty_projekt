<?php
namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class UzytkownicyController extends Controller
{
    public function index()
    {
        $uzytkownicy = Uzytkownik::all();
        return view('uzytkownicy.index', compact('uzytkownicy'));
    }

    public function create()
    {
        return view('uzytkownicy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa_uzytkownika' => 'required|unique:uzytkownicy|max:255',
            'email' => 'required|email|unique:uzytkownicy,email',
            'haslo' => 'required|min:6',
            'rola' => 'required|in:administrator,klient,pracownik,sedzia',
        ]);

        // Tworzymy użytkownika bez podawania hasła w sposób jawny (to robi setter w modelu)
        Uzytkownik::create([
            'nazwa_uzytkownika' => $request->nazwa_uzytkownika,
            'email' => $request->email,
            'haslo' => $request->haslo,
            'rola' => $request->rola,
        ]);

        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik został dodany.');
    }

    public function edit($id)
    {
        $uzytkownik = Uzytkownik::findOrFail($id);  // Pobieramy użytkownika po id
        return view('uzytkownicy.edit', compact('uzytkownik'));  // Przekazujemy do widoku
    }

    public function update(Request $request, $id)
    {
        $uzytkownik = Uzytkownik::findOrFail($id);  // Pobieramy użytkownika po id

        $request->validate([
            'nazwa_uzytkownika' => 'required|string|max:255',
            'email' => 'required|email|unique:uzytkownicy,email,' . $id,
            'rola' => 'required|in:administrator,klient,pracownik,sedzia',
        ]);

        $uzytkownik->update($request->all());  // Aktualizujemy dane użytkownika

        return redirect()->route('uzytkownicy.index');  // Przekierowujemy na stronę listy użytkowników
    }

    public function destroy($id)
    {
        $uzytkownik = Uzytkownik::findOrFail($id);  // Pobieramy użytkownika po id
        $uzytkownik->delete();  // Usuwamy użytkownika

        return redirect()->route('uzytkownicy.index');  // Przekierowujemy na stronę listy użytkowników
    }
}
