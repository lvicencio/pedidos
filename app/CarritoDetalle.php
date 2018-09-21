<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
	//relacion  detalle n  - 1 product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
