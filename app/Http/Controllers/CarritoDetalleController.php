<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarritoDetalle;

class CarritoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carroDetalle = new CarritoDetalle();
        $carroDetalle->carrito_id   =   auth()->user()->carrito->id;
        $carroDetalle->product_id   =   $request->product_id;
        $carroDetalle->quantity     =   $request->quantity;

        $carroDetalle->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $carroDetalle = CarritoDetalle::findOrFail($request->input('carrito_detail_id'));
        
        //verifica si el carrito id es igual al del usuario logeado
        if ($carroDetalle->carrito_id ==  auth()->user()->carrito->id) {
            $carroDetalle->delete();
        }
        

        return back();
    }
}
