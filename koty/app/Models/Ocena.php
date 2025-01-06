<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    use HasFactory;

    protected $table = 'oceny';
    public $timestamps = false;

    protected $fillable = [
        'kot_id',
        'wystawa_id',
        'sedzia_id',
        'ocena',
        'komentarze',
        'data_oceny',
    ];

    // Relacja: Ocena dotyczy kota
    public function kot()
    {
        return $this->belongsTo(Kot::class, 'kot_id');
    }

    // Relacja: Ocena dotyczy wystawy
    public function wystawa()
    {
        return $this->belongsTo(Wystawa::class, 'wystawa_id');
    }

    // Relacja: Ocena jest przyznana przez użytkownika (sędziego)
    public function sedzia()
    {
        return $this->belongsTo(Uzytkownik::class, 'sedzia_id');
    }
	protected $dates = [
        'data_oceny', 
    ];
}
