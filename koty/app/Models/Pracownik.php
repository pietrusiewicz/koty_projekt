<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    use HasFactory;

    protected $table = 'pracownicy';

    protected $fillable = [
        'uzytkownik_id',
        'rola',
        'data_zatrudnienia',
    ];

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'uzytkownik_id');
    }
}
