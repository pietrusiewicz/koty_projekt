<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kot extends Model
{
    use HasFactory;

    protected $table = 'koty';

    protected $fillable = [
        'nazwa',
        'rasa',
        'wiek',
        'kolor',
        'plec',
        'wlasciciel_id',
        'opis',
    ];

    // Relacja: Kot należy do użytkownika (właściciela)
    public function wlasciciel()
    {
        return $this->belongsTo(Uzytkownik::class, 'wlasciciel_id');
    }

    // Relacja: Kot może być oceniany wiele razy
    public function oceny()
    {
        return $this->hasMany(Ocena::class, 'kot_id');
    }
}
