<?php

namespace App\Http\Controllers;

use App\Models\Bilet;
use App\Models\Zamowienie;
use App\Models\Uzytkownik;
use App\Models\Logi;
use App\Models\Wystawa;
use Illuminate\Http\Request;

class BiletyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bilety = Bilet::with(['klient', 'wystawa'])->get();
        return view('bilety.index', compact('bilety'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$rodzaje_biletow = [
			'normalny' => 20.00,  // Rodzaj biletu -> cena
			'ulgowy' => 10.00,
			'grupowy' => 50.00,
		];        
		$klienci = Uzytkownik::all();
        $wystawy = Wystawa::all();
        return view('bilety.create', compact('klienci', 'wystawy', 'rodzaje_biletow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$rodzaje_biletow = [
			'normalny' => 20.00,  // Rodzaj biletu -> cena
			'ulgowy' => 10.00,
			'grupowy' => 50.00,
		];
		//dd($request->all());
		if (session('user')['rola']=='administrator') {
			$validated = $request->validate([
				'klient_id' => 'required|exists:uzytkownicy,id',
				'wystawa_id' => 'required|exists:wystawy,id',
				'rodzaj_biletu' => 'required|string',
			]);
			$validated['cena'] = $rodzaje_biletow[$validated['rodzaj_biletu']];
		}

		else {
			$validated = $request->validate([
				'wystawa_id' => 'required|exists:wystawy,id',
				'rodzaj_biletu' => 'required|string',
			]);
			$validated['klient_id'] = session('user')['id'];
			$validated['cena'] = $rodzaje_biletow[$validated['rodzaj_biletu']];
		}
		$validated['data_zakupu'] = now();
		
		//dd($validated);
        Bilet::create($validated);
		$zamowienie = new Zamowienie();
        $zamowienie->klient_id = $validated['klient_id']; // Identyfikator klienta
        $zamowienie->data_zamowienia = $validated['data_zakupu']; // Data zamówienia
        $zamowienie->cena_calkowita = $validated['cena']; // Całkowita cena, przykładowa wartość
        $zamowienie->status = 'oczekujące'; // Status zamówienia
        $zamowienie->status_platnosci = 'oczekująca'; // Status płatności

        $zamowienie->save();
		Logi::utworzLogi('utworzenie biletu');
        return redirect()->route('bilety.index')->with('success', 'Bilet został dodany.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
		$bilet = Bilet::findOrFail($id);
        $klienci = Uzytkownik::all();
        $wystawy = Wystawa::all();
        return view('bilety.edit', compact('bilet', 'klienci', 'wystawy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
		$bilet = Bilet::findOrFail($id);
        if (session('user')['rola']=='administrator') 
			$validated = $request->validate([
				'klient_id' => 'required|exists:uzytkownicy,id',
				'wystawa_id' => 'required|exists:wystawy,id',
				'rodzaj_biletu' => 'required|string',
				'cena' => 'required|numeric',
			]);
		else {
			$validated = $request->validate([
				'wystawa_id' => 'required|exists:wystawy,id',
				'rodzaj_biletu' => 'required|string',
				'cena' => 'required|numeric',
			]);
			$validated['klient_id'] = session('user')['id'];
		}

        $bilet->update($validated);
		Logi::utworzLogi('edycja biletu');

        return redirect()->route('bilety.index')->with('success', 'Bilet został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		$bilet = Bilet::findOrFail($id);
        $bilet->delete();
		Logi::utworzLogi('anulowanie biletu');
        return redirect()->route('bilety.index')->with('success', 'Bilet został anulowany.');
    }
}
