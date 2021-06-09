<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function proveedor(){
        return $this->hasOne(proveedor::class);
    }
    use HasFactory;
}
