<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siaran extends Model
{
    protected $fillable = ['daypart', 'tanggal', 'penyiar_id', 'interaksi_pendengar'];

    public function penyiar()
    {
        return $this->belongsTo(Penyiar::class);
    }

}
