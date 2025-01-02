<?php

namespace App\Http\Controllers;

use App\Models\Bilet;
use App\Models\Uzytkownik;
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
        $klienci = Uzytkownik::all();
        $wystawy = Wystawa::all();
        return view('bilety.create', compact('klienci', 'wystawy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'wystawa_id' => 'required|exists:wystawy,id',
            'rodzaj_biletu' => 'required|string',
            'cena' => 'required|numeric',
        ]);
		$validated['data_zakupu'] = now();

        Bilet::create($validated);
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
        $request->validate([
            'klient_id' => 'required|exists:uzytkownicy,id',
            'wystawa_id' => 'required|exists:wystawy,id',
            'rodzaj_biletu' => 'required|string',
            'cena' => 'required|numeric',
        ]);

        $bilet->update($request->all());
        return redirect()->route('bilety.index')->with('success', 'Bilet został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		$bilet = Bilet::findOrFail($id);
        $bilet->delete();
        return redirect()->route('bilety.index')->with('success', 'Bilet został usunięty.');
    }
}
