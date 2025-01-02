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
		'kategoria_id',
        'opis',
    ];
	public function wlasciciel()
    {
        return $this->belongsTo(Uzytkownik::class, 'wlasciciel_id');
    }
	public function kategoria()
	{
		return $this->belongsTo(Kategorie::class, 'kategoria_id');
	}

}
