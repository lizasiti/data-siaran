<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = ['nama_program', 'waktu', 'deskripsi'];
}
