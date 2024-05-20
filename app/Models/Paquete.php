<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'destinatario',
        'direccion',
        'camionero_id'
    ];

    public function camionero()
    {
        return $this->belongsTo(Camionero::class);
    }
}

