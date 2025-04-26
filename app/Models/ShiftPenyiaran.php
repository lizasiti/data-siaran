<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Penyiar;

class ShiftPenyiaran extends Model
{
    use HasFactory;

    protected $table = 'shift_penyiarans';
    protected $fillable = [
        'penyiar_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'naskah_siaran',
    ];

    public function penyiar()
    {
        return $this->belongsTo(Penyiar::class, 'penyiar_id');
    }
}
