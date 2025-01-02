<?php

namespace App\Http\Controllers;

use App\Models\SzczegolyZamowienia;
use App\Models\Zamowienie;
use App\Models\Bilet;
use Illuminate\Http\Request;

class SzczegolyZamowieniaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $szczegoly = SzczegolyZamowienia::with(['zamowienie', 'bilet'])->get();
        return view('szczegoly_zamowienia.index', compact('szczegoly'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zamowienia = Zamowienie::all();
        $bilety = Bilet::all();
        return view('szczegoly_zamowienia.create', compact('zamowienia', 'bilety'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'zamowienie_id' => 'required|exists:zamowienia,id',
            'bilet_id' => 'required|exists:bilety,id',
            'ilosc' => 'required|integer|min:1',
            'cena' => 'required|numeric|min:0',
        ]);

        $request['cena_calkowita'] = $request->ilosc * $request->cena;

        SzczegolyZamowienia::create($request->all());

        return redirect()->route('szczegoly-zamowienia.index')->with('success', 'Szczegóły zamówienia dodane!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
		$szczegolyZamowienia = szczegolyZamowienia::findOrFail($id);
        $zamowienia = Zamowienie::all();
        $bilety = Bilet::all();
        return view('szczegoly_zamowienia.edit', compact('szczegolyZamowienia', 'zamowienia', 'bilety'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $szczegolyZamowienia = szczegolyZamowienia::findOrFail($id);
		$request->validate([
            'zamowienie_id' => 'required|exists:zamowienia,id',
            'bilet_id' => 'required|exists:bilety,id',
            'ilosc' => 'required|integer|min:1',
            'cena' => 'required|numeric|min:0',
        ]);

        $request['cena_calkowita'] = $request->ilosc * $request->cena;

        $szczegolyZamowienia->update($request->all());

        return redirect()->route('szczegoly-zamowienia.index')->with('success', 'Szczegóły zamówienia zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $szczegolyZamowienia = szczegolyZamowienia::findOrFail($id);
		$szczegolyZamowienia->delete();

        return redirect()->route('szczegoly-zamowienia.index')->with('success', 'Szczegóły zamówienia usunięte!');
    }
}
