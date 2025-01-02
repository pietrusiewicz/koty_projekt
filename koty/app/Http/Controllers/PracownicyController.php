<?php

namespace App\Http\Controllers;

use App\Models\Pracownik;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class PracownicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pracownicy = Pracownik::with('uzytkownik')->get();
        return view('pracownicy.index', compact('pracownicy'));
    }

    public function create()
    {
        $uzytkownicy = Uzytkownik::all();
        return view('pracownicy.create', compact('uzytkownicy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'rola' => 'required|string|max:255',
            'data_zatrudnienia' => 'required|date',
        ]);

        Pracownik::create($request->all());

        return redirect()->route('pracownicy.index')->with('success', 'Pracownik dodany pomyślnie.');
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
		$pracownik = Pracownik::findOrFail($id);
        $uzytkownicy = Uzytkownik::all();
        return view('pracownicy.edit', compact('pracownik', 'uzytkownicy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
		$pracownik = Pracownik::findOrFail($id);
        $request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'rola' => 'required|string|max:255',
            'data_zatrudnienia' => 'required|date',
        ]);

        $pracownik->update($request->all());
        return redirect()->route('pracownicy.index')->with('success', 'Pracownik zaktualizowany pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		$pracownik = Pracownik::findOrFail($id);

        $pracownik->delete();

        return redirect()->route('pracownicy.index')->with('success', 'Pracownik usunięty pomyślnie.');
    }
}
