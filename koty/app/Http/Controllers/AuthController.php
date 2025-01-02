<?php

namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function showRegisterForm()
    {
        return view('register');
    }
	
	public function register(Request $request)
    {
		    //dd($request->all());
		$request->validate([
            'nazwa_uzytkownika' => 'required|unique:uzytkownicy|max:255',
            'email' => 'required|email|unique:uzytkownicy,email',
            'haslo' => 'required|min:6',
        ]);

        // Tworzymy użytkownika bez podawania hasła w sposób jawny (to robi setter w modelu)
        Uzytkownik::create([
            'nazwa_uzytkownika' => $request->nazwa_uzytkownika,
            'email' => $request->email,
            'haslo' => $request->haslo,
        ]);

        return redirect()->route('login.form')->with('success', 'Rejestracja zakończona pomyślnie. Zaloguj się.');
    }
	
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'haslo' => 'required|string',
        ]);

		$uzytkownik = Uzytkownik::where('email', $request->email)->first();
		
 
		//dd($uzytkownik->haslo);
		
		//dd($request->haslo);
		$a = $uzytkownik->haslo;
		$b = $request->haslo;
		if (is_null($a) || is_null($b)) return back()->withErrors(['email' => 'Nieprawidłowe dane logowania.']);
		
		if ($a == $b) {
			//Auth::login($uzytkownik);
			session(['user'=>$uzytkownik->nazwa_uzytkownika]);
			return redirect()->route('home');
        } else {		dd($request->all());
			return back()->withErrors(['email' => 'Nieprawidłowe dane logowania.']);
		}
	}

    public function logout(Request $request)
    {
		if ($request->session()->has('user')) {
			$request->session()->forget('user');
		}
        return redirect()->route('login.form')->with('success', 'Wylogowano pomyślnie.');
    }
}
