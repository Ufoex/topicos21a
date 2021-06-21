<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function provider(){
        return $this->belongsTo(Provider::class, 'providers_id');
    }
    public function ventas(){
        return $this->hasMany(Venta::class);
    }

}
