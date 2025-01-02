<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UzytkownicyController,
    KotyController,
    WystawyController,
    KategorieController,
    OcenyController,
    BiletyController,
    ZamowieniaController,
    SzczegolyZamowieniaController,
    PracownicyController,
    LogiController,
    MetodyPlatnosciController,
    SponsorzyController,
    HomeController,
	AuthController,
};

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::resource('/', HomeController::class);
Route::resource('uzytkownicy', UzytkownicyController::class);
Route::resource('koty', KotyController::class);
Route::resource('wystawy', WystawyController::class);
Route::resource('kategorie', KategorieController::class);
Route::resource('oceny', OcenyController::class);
Route::resource('bilety', BiletyController::class);
Route::resource('zamowienia', ZamowieniaController::class);
Route::resource('szczegoly-zamowienia', SzczegolyZamowieniaController::class);
Route::resource('pracownicy', PracownicyController::class);
Route::resource('logi', LogiController::class);
Route::resource('metody-platnosci', MetodyPlatnosciController::class);
Route::resource('sponsorzy', SponsorzyController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
