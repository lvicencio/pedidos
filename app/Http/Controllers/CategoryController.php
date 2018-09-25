<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $messages= [
            'name.required'         => 'Debe ingresar el nombre de la Categoria.',
            'name.min'              => 'Minimo 3 caracteres.',
            'description.required'  => 'Ingrese una description de la Categoria',
            'description.min'       => 'Minimo 3 caracteres',
            'description.max'       => 'Maximo 200 caracteres'
        ];
        $rules = [
            'name'          => 'required|min:3',
            'description'   => 'required|min:3|max:200'
        ];

        $this->validate($request, $rules, $messages);


        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        $notification = 'Categoria Creada con Exito';
        return redirect('/admin/categories')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        
        return view("admin.categories.show")->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit')->with(compact('category'));
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

        $messages= [
            'name.required'         => 'Debe ingresar el nombre de la Categoria.',
            'name.min'              => 'Minimo 3 caracteres.',
            'description.required'  => 'Ingrese una description de la Categoria',
            'description.min'       => 'Minimo 3 caracteres',
            'description.max'       => 'Maximo 200 caracteres'
        ];
        $rules = [
            'name'          => 'required|min:3',
            'description'   => 'required|min:3|max:200'
        ];

        $this->validate($request, $rules, $messages);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        $notification = 'Categoria Editado con Exito';
        return redirect('/admin/categories')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $noti   = 'Categoria Eliminada con Exito';
        return back()->with(compact('noti'));
    }
}
