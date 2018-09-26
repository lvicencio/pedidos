<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request)
    {
        $busqueda   =   $request->input('busqueda');
        $products = Product::where('name', 'like', "%$busqueda%")->paginate(9);

        return view('admin.products.search')->with(compact('products', 'busqueda'));
    }

    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $messages   = [
             'name.required'        => 'Nombre es requerido',
             'name.min'             => 'Nombre minimo 3 caracteres',
             'description.required' => 'Descripción es obligatorio',
             'description.max'      => 'Descripción tiene un maximo de 200 caracteres',
             'price.required'       => 'Precio del producto es obligatorio',
             'price.numeric'        => 'Precio NO valido',
             'price.min'            => 'El Precio debe ser positivo'
        ];
        $rules      = [
            'name'          => 'required|min:3',
            'description'   => 'required|max:200',
            'price'         => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->images()->get();

        return view("admin.products.show")->with(compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories'));
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

        $messages   = [
             'name.required'        => 'Nombre es requerido',
             'name.min'             => 'Nombre minimo 3 caracteres',
             'description.required' => 'Descripción es obligatorio',
             'description.max'      => 'Descripción tiene un maximo de 200 caracteres',
             'price.required'       => 'Precio del producto es obligatorio',
             'price.numeric'        => 'Precio NO valido',
             'price.min'            => 'El Precio debe ser positivo'
        ];
        $rules      = [
            'name'          => 'required|min:3',
            'description'   => 'required|max:200',
            'price'         => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back();
    }
}
