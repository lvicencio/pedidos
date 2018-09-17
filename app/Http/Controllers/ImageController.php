<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $product = Product::findOrFail($id);
        $images = $product->images;

        return view("admin.products.images.index")->with(compact('product','images'));
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
    public function store(Request $request, $id)
    {
        //
        $file       = $request->file('photo');
        $path       = public_path().'/images/products';
        $fileName   = uniqid().$file->getClientOriginalName();
        $file->move($path, $fileName);

        $productImage = new ProductImage();
        $productImage->image = $fileName;
        $productImage->product_id = $id;

        $productImage->save();

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
    public function destroy(Request $request, $id)
    {
        $productImage = ProductImage::findOrFail($request->input('image_id'));
        if (substr($productImage->image, 0, 4) === "http") {
            # code...
            $deleted = true;
        } else {
            # code...
            $fullPath   = public_path().'/images/products/' . $productImage->image;
            $deleted    = File::delete($fullPath);
        }

        if ($deleted) {
            $productImage->delete();
        }
        
        return back();
    }
}
