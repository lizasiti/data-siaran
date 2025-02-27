<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyiar extends Model
{
    use HasFactory;

    protected $table = 'penyiars'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = ['nama', 'foto']; // Tambahkan ini untuk mengizinkan mass assignment
}
