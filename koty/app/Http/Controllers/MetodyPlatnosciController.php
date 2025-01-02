<?php

namespace App\Http\Controllers;

use App\Models\MetodyPlatnosci;
use Illuminate\Http\Request;

class MetodyPlatnosciController extends Controller
{
    public function index()
    {
        $metodyPlatnosci = MetodyPlatnosci::all();
        return view('metody_platnosci.index', compact('metodyPlatnosci'));
    }

    public function create()
    {
		$metodyPlatnosci = MetodyPlatnosci::all();
        return view('metody_platnosci.create', compact('metodyPlatnosci'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        MetodyPlatnosci::create($request->all());
        return redirect()->route('metody_platnosci.index')->with('success', 'Metoda płatności została dodana!');
    }

    public function show(MetodyPlatnosci $metodyPlatnosci)
    {
        return view('metody_platnosci.show', compact('metodyPlatnosci'));
    }

    public function edit(MetodyPlatnosci $metodyPlatnosci)
    {
        return view('metody_platnosci.edit', compact('metodyPlatnosci'));
    }

    public function update(Request $request, MetodyPlatnosci $metodyPlatnosci)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        $metodyPlatnosci->update($request->all());
        return redirect()->route('metody-platnosci.index')->with('success', 'Metoda płatności została zaktualizowana!');
    }

    public function destroy(MetodyPlatnosci $metodyPlatnosci)
    {
        $metodyPlatnosci->delete();
        return redirect()->route('metody-platnosci.index')->with('success', 'Metoda płatności została usunięta!');
    }
}
