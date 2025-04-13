<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    use HasFactory;

    protected $table = 'weekly';
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'jam_mulai', 'jam_selesai', 'hari'];
}
