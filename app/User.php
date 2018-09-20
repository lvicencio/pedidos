<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Carrito;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//relacion

    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }


//accesador para carrito_id
    public function getCarritoIdAttribute()
    {
        $carrito =  $this->carritos()->where('status', 'Active')->first();

        if ($carrito) {
            return $carrito->id;
        }

        $carrito = new Carrito();
        $carrito->status = 'Active';
        $carrito->user_id   = $this->id;

        $carrito->save();

        return $carrito->id;


    }
}
