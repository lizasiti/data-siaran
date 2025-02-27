<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_siaran'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary Key

    protected $fillable = [
        'penyiar',
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
    ];

    public $timestamps = true;
}
