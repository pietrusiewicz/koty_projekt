<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorzyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorzy = Sponsor::all();
        return view('sponsorzy.index', compact('sponsorzy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sponsorzy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nazwa' => 'required|unique:sponsorzy|max:255',
            'dane_kontaktowe' => 'required',
            'wniosek' => 'nullable|numeric|min:0',
        ]);

        Sponsor::create($validated);
        return redirect()->route('sponsorzy.index')->with('success', 'Sponsor dodany pomyślnie.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$sponsor = Sponsor::findOrFail($id);  // Pobieramy użytkownika po id
        return view('sponsorzy.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sponsor = Sponsor::findOrFail($id);  // Pobieramy użytkownika po id

        $validated = $request->validate([
            'nazwa' => 'required|max:255|unique:sponsorzy,nazwa,' . $sponsor->id,
            'dane_kontaktowe' => 'required',
            'wniosek' => 'nullable|numeric|min:0',
        ]);

        $sponsor->update($validated);
        return redirect()->route('sponsorzy.index')->with('success', 'Sponsor zaktualizowany pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		$sponsor = Sponsor::findOrFail($id);  // Pobieramy użytkownika po id
        $sponsor->delete();
        return redirect()->route('sponsorzy.index')->with('success', 'Sponsor usunięty pomyślnie.');
    }
}
