<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;

class CarritoController extends Controller
{
   
      public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function update()
    {
        $carrito = auth()->user()->carrito;
        $carrito->status = 'Pending';
        $ldate = date('Y-m-d H:i:s');
        $carrito->order_date = $ldate;
        $carrito->save();

        $noti = 'Tu Pedido se ha registrado';
        return back()->with(compact('noti'));
    }
     public function status(Request $request)
    {
        $id= $request->input('carrito_id');
        $carrito = Carrito::findOrFail($id);
      //  dd($carrito->status);
            $carrito->status = 'Entregado';
            $ldate = date('Y-m-d H:i:s');
            $carrito->arrived_date = $ldate;
            $noti = 'Pedido entregado';
           
             $carrito->save();

        
        return back()->with(compact('noti'));
    }

 
    public function destroy($id)
    {
         $carrito = Carrito::findOrFail($id);

         $carrito->status = 'Pending';
            $carrito->arrived_date = null;
            $noti = 'Pedido Pendiente';
           
             $carrito->save();

             return back()->with(compact('noti'));
    }
}
