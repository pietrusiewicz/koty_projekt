<?php

namespace App\Http\Controllers;

use App\Models\Zamowienie;
use App\Models\Uzytkownik;
use App\Models\Logi;
use Illuminate\Http\Request;

class ZamowieniaController extends Controller
{
    public function index()
    {
        $zamowienia = Zamowienie::with('klient')->get();
        return view('zamowienia.index', compact('zamowienia'));
    }

    public function create()
    {
        $klienci = Uzytkownik::all();
        return view('zamowienia.create', compact('klienci'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'data_zamowienia' => 'required|date',
            'cena_calkowita' => 'required|numeric',
            'status' => 'required|in:oczekujące,zrealizowane',
            'status_platnosci' => 'required|in:oczekująca,zapłacona',
        ]);
		
		Logi::utworzLogi('utworzenie zamówienia');
        Zamowienie::create($request->all());
        return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało dodane.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
		$zamowienie = Zamowienie::findOrFail($id);
        $klienci = Uzytkownik::all();
        return view('zamowienia.edit', compact('zamowienie', 'klienci'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
		$zamowienie = Zamowienie::findOrFail($id);
        $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'data_zamowienia' => 'required|date',
            'cena_calkowita' => 'required|numeric',
            'status' => 'required|in:oczekujące,zrealizowane',
            'status_platnosci' => 'required|in:oczekująca,zapłacona',
        ]);

        $zamowienie->update($request->all());
		Logi::utworzLogi('zaktualizowano zamówienie');
        return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało zaktualizowane.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		$zamowienie = Zamowienie::findOrFail($id);
        $zamowienie->delete();
        return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało usunięte.');
    }
	public function oplac($id)
	{
		// Pobieramy zamówienie na podstawie ID
		$zamowienie = Zamowienie::find($id);

		if (!$zamowienie) {
			return redirect()->route('zamowienia.index')->with('error', 'Zamówienie nie zostało znalezione!');
		}

		// Symulujemy opłacenie zamówienia
		$zamowienie->status_platnosci = 'zapłacona'; // Zmiana statusu płatności
		$zamowienie->status = 'zrealizowane'; // Zmiana statusu zamówienia
		$zamowienie->save(); // Zapisanie zmian

		Logi::utworzLogi('usunięto zamówienie');
		return redirect()->route('zamowienia.index')->with('success', 'Zamówienie zostało opłacone i zrealizowane!');
	}
}
