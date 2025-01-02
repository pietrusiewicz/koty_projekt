<?php

namespace App\Http\Controllers;

use App\Models\Logi;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class LogiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logi = Logi::with('uzytkownik')->get();
        return view('logi.index', compact('logi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uzytkownicy = Uzytkownik::all();
        return view('logi.create', compact('uzytkownicy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'akcja' => 'required|string|max:255',
            'data_akcji' => 'nullable|date',
        ]);

        Logi::create($request->all());
        return redirect()->route('logi.index');
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
        $logi = Logi::findOrFail($id);  // Pobieramy użytkownika po id
		$uzytkownicy = Uzytkownik::all();
        return view('logi.edit', compact('logi', 'uzytkownicy'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logi = Logi::findOrFail($id);  // Pobieramy użytkownika po id
		
		$request->validate([
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
            'akcja' => 'required|string|max:255',
            'data_akcji' => 'nullable|date',
        ]);

        $logi->update($request->all());
        return redirect()->route('logi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logi = Logi::findOrFail($id);  // Pobieramy użytkownika po id

        $logi->delete();
        return redirect()->route('logi.index');
    }
}
