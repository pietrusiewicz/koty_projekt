<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Uzytkownik extends Authenticatable
{
    use HasFactory;

    protected $table = 'uzytkownicy';

    protected $fillable = [
        'nazwa_uzytkownika',
        'haslo',
        'email',
        'rola',
    ];

    protected $hidden = [
        'haslo',
    ];

    // Relacja: Użytkownik ma wiele kotów
    public function koty()
    {
        return $this->hasMany(Kot::class, 'wlasciciel_id');
    }

    // Relacja: Użytkownik może mieć wiele logów
    public function logi()
    {
        return $this->hasMany(Log::class, 'uzytkownik_id');
    }

    // Relacja: Użytkownik jako klient może mieć wiele biletów
    public function bilety()
    {
        return $this->hasMany(Bilet::class, 'klient_id');
    }

    // Relacja: Użytkownik jako klient może mieć wiele zamówień
    public function zamowienia()
    {
        return $this->hasMany(Zamowienie::class, 'klient_id');
    }

    // Relacja: Użytkownik jako pracownik (jeśli dotyczy)
    public function pracownik()
    {
        return $this->hasOne(Pracownik::class, 'uzytkownik_id');
    }
}
