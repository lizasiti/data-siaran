<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siaran extends Model
{
    protected $fillable = ['daypart', 'tanggal', 'penyiar', 'interaksi_pendengar'];

}
