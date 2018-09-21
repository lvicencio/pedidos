<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    
    public function details()
    {
    	return $this->hasMany(CarritoDetalle::class);
    }
}
