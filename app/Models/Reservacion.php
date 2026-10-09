<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $fillable = [
        'cantidadPersonas',
        'precioTotal',
        'id_cliente',
        'id_tour'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'id_tour');
    }
}
