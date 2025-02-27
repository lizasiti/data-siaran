<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftPenyiaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyiar',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'naskah_siaran', 
    ];
    
}
