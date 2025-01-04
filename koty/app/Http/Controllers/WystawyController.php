<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wystawa;

class WystawyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wystawy = Wystawa::all();
        return view('wystawy.index', compact('wystawy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wystawy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
            'miejsce' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        Wystawa::create($request->all());
		Logi::utworzLogi('Utworzono wystawę');

        return redirect()->route('wystawy.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
		$wystawy = Wystawa::findOrFail($id);
        return view('wystawy.edit', compact('wystawy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
		$wystawy = Wystawa::findOrFail($id);  // Pobieramy użytkownika po id

        $request->validate([
            'nazwa' => 'required|string|max:255',
            'data_rozpoczecia' => 'required|date',
            'data_zakonczenia' => 'required|date',
            'miejsce' => 'required|string|max:255',
            'opis' => 'nullable|string',
        ]);

        $wystawy->update($request->all());
		Logi::utworzLogi('zaktualizowano wystawę');

        return redirect()->route('wystawy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		$wystawy = Wystawa::findOrFail($id);  // Pobieramy użytkownika po id
		$wystawy->delete();
		Logi::utworzLogi('usunięto wystawę');
        return redirect()->route('wystawy.index');
    }
}
