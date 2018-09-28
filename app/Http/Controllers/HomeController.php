<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //administrador
        if (auth()->user()->id == 1) {
            $ordenes =Carrito::orderBy('status', 'desc')->get();
            return view('home')->with(compact('ordenes'));
        }

        //cliente
        $id_user = auth()->user()->id;
        $ordenes = Carrito::where('user_id', '=' , $id_user)->get();
        return view('home')->with(compact('ordenes'));
    }
}
