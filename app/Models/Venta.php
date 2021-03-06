<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function producto(){
        return $this->belongsTo(Producto::class, 'productos_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'clientes_id');
    }

    use HasFactory;
}
