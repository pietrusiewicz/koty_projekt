<?php

namespace App\Http\Controllers;

use App\Models\Kategorie;
use Illuminate\Http\Request;

class KategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategorie = Kategorie::all();
        return view('kategorie.index', compact('kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        Kategorie::create($request->all());
        return redirect()->route('kategorie.index')->with('success', 'Kategoria została dodana.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategorie $kategorie)
    {
        return view('kategorie.edit', compact('kategorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategorie $kategorie)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        $kategorie->update($request->all());
        return redirect()->route('kategorie.index')->with('success', 'Kategoria została zaktualizowana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategorie $kategorie)
    {
        $kategorie->delete();
        return redirect()->route('kategorie.index')->with('success', 'Kategoria została usunięta.');
    }
}
