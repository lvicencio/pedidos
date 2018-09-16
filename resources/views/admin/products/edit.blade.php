@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Editar Producto {{ $product->name }}</h2>
        <hr>

        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
         {{ csrf_field() }}

     
            <div class="form-group col-md-6">
              <label class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group col-md-6">
              <label for="inputPassword4">Resumen</label>
              <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            </div>

            
            <div class="form-group col-md-6">
              <label for="inputPassword4">Precio</label>
              <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price }}">
            </div>
       
            <div class="form-group col-md-6">
              <label for="inputPassword4">Descripción</label>
              <textarea class="form-control" rows="4"  name="long_description">{{ $product->long_description }}</textarea>
            </div>
 
        <button type="submit" class="btn btn-info">Actualizar Cambios</button>
        <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar </a>
        </form>


      </div>
     

    </div>
  </div>

@include('includes.footer')
@endsection
