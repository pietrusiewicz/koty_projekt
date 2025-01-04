<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logi extends Model
{
    use HasFactory;

    protected $table = 'logi';

    protected $fillable = [
        'uzytkownik_id',
        'akcja',
        'data_akcji',
    ];

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'uzytkownik_id');
    }
	public static function utworzLogi(string $trescAkcji )
    {
        return self::create([
			'uzytkownik_id' => session('user')['id'], // Identyfikator klienta
			'akcja' => $trescAkcji,
			'data_akcji' => now(),
        ]);
    }
}
