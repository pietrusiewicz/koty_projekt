<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Models\Kot;
use App\Models\Wystawa;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class OcenyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oceny = Ocena::all();
        return view('oceny.index', compact('oceny'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $koty = Kot::all();
        $wystawy = Wystawa::all();
        $sedziowie = Uzytkownik::where('rola', 'sedzia')->get();
        return view('oceny.create', compact('koty', 'wystawy', 'sedziowie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kot_id' => 'required|exists:koty,id',
            'wystawa_id' => 'required|exists:wystawy,id',
            'sedzia_id' => 'required|exists:uzytkownicy,id',
            'ocena' => 'required|integer|min:1|max:10',
            'komentarze' => 'nullable|string'
        ]);
		
		$validated['data_oceny'] = now();
		
		Ocena::create($validated);
        return redirect()->route('oceny.index');
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
		$ocena = Ocena::findOrFail($id);  // Pobieramy użytkownika po id

        $koty = Kot::all();
        $wystawy = Wystawa::all();
        $sedziowie = Uzytkownik::where('rola', 'sedzia')->get();
        return view('oceny.edit', compact('ocena', 'koty', 'wystawy', 'sedziowie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
		$ocena = Ocena::findOrFail($id);  // Pobieramy użytkownika po id

        $validated = $request->validate([
            'kot_id' => 'required|exists:koty,id',
            'wystawa_id' => 'required|exists:wystawy,id',
            'sedzia_id' => 'required|exists:uzytkownicy,id',
            'ocena' => 'required|integer|min:1|max:10',
            'komentarze' => 'nullable|string'
        ]);

        $ocena->update($validated);
        return redirect()->route('oceny.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ocena = Ocena::findOrFail($id);  // Pobieramy użytkownika po id
		$ocena->delete();
        return redirect()->route('oceny.index');
    }
}
